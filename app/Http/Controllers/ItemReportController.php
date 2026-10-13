<?php

namespace App\Http\Controllers;

use App\Models\ItemReport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ItemReportController extends Controller
{
    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $isFound = $request->input('report_type') === 'found';

        $validated = $request->validate([
            'report_type' => ['required', Rule::in(['lost', 'found'])],
            'item_name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'location' => ['required', 'string', 'max:255'],
            'event_date' => ['required', 'date', 'before_or_equal:today'],
            'description' => ['required', 'string', 'max:5000'],
            'whatsapp' => [Rule::requiredIf($isFound), 'nullable', 'string', 'regex:/^[0-9+\-\s()]{8,20}$/'],
            'whatsapp_consent' => [Rule::requiredIf($isFound), 'accepted'],
        ]);

        unset($validated['whatsapp_consent']);
        if (!$isFound || empty($validated['whatsapp'])) {
            $validated['whatsapp'] = null;
            $validated['whatsapp_consent_at'] = null;
        } else {
            $validated['whatsapp_consent_at'] = now();
        }

        $request->user()->itemReports()->create($validated);

        return redirect()->route('home')->with('success', 'Laporan berhasil disimpan ke FINDIT!');
    }
}
