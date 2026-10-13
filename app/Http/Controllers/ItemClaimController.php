<?php

namespace App\Http\Controllers;

use App\Models\ItemClaim;
use App\Models\ItemReport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ItemClaimController extends Controller
{
    public function store(Request $request, ItemReport $report)
    {
        abort_unless($report->report_type === 'found', 404);
        abort_if($report->user_id === $request->user()->id, 403, 'Kamu tidak dapat mengklaim laporan milikmu sendiri.');
        abort_if(in_array($report->status, ['claimed', 'returned', 'rejected'], true), 409, 'Laporan ini sudah ditutup.');
        $validated = $request->validate(['message' => ['required', 'string', 'min:10', 'max:1500']]);
        $existing = ItemClaim::where('item_report_id', $report->id)->where('claimant_id', $request->user()->id)->whereIn('status', ['pending', 'approved'])->exists();
        if ($existing) {
            return back()->with('error', 'Kamu sudah memiliki klaim aktif untuk laporan ini.');
        }
        ItemClaim::create(['item_report_id' => $report->id, 'claimant_id' => $request->user()->id, 'message' => $validated['message'], 'status' => 'pending']);
        return back()->with('success', 'Klaim berhasil diajukan. Penemu barang perlu memeriksa informasi dan bukti kepemilikanmu.');
    }

    public function update(Request $request, ItemClaim $claim)
    {
        $claim->load('report');
        abort_unless($claim->report->user_id === $request->user()->id, 403);
        $validated = $request->validate(['action' => ['required', Rule::in(['approve', 'reject', 'return'])]]);
        if ($validated['action'] === 'approve') {
            abort_unless($claim->status === 'pending', 409, 'Klaim ini tidak lagi menunggu verifikasi.');
            $claim->update(['status' => 'approved']);
            $claim->report->update(['status' => 'claimed']);
            $message = 'Klaim disetujui. Pastikan identitas dan bukti kepemilikan diperiksa sebelum menyerahkan barang.';
        } elseif ($validated['action'] === 'reject') {
            abort_unless($claim->status === 'pending', 409, 'Klaim ini tidak lagi menunggu verifikasi.');
            $claim->update(['status' => 'rejected']);
            $message = 'Klaim ditolak.';
        } else {
            abort_unless($claim->status === 'approved', 409, 'Setujui klaim sebelum mengonfirmasi pengembalian.');
            $claim->update(['status' => 'returned']);
            $claim->report->update(['status' => 'returned']);
            $message = 'Pengembalian barang berhasil dikonfirmasi.';
        }
        return back()->with('success', $message);
    }
}
