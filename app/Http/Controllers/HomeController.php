<?php

namespace App\Http\Controllers;

use App\Models\ItemReport;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $reports = ItemReport::query()
            ->with(['user:id,name', 'claims.claimant:id,name'])
            ->latest()
            ->take(12)
            ->get();

        return view('home', compact('reports'));
    }
}
