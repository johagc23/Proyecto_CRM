<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Interaction;
use App\Models\Product;

class ReportController extends Controller
{
    public function index()
    {
        $totalClients = Client::count();
        $totalInteractions = Interaction::count();
        $totalProducts = Product::count();
        $recentClients = Client::with('origin', 'user')->latest()->take(5)->get();

        return view('reports.index', compact('totalClients', 'totalInteractions', 'totalProducts', 'recentClients'));
    }

    public function exportPdf()
    {
        $clients = Client::with('origin', 'user')->get();
        $totalClients = Client::count();
        
        return view('reports.pdf', compact('clients', 'totalClients'));
    }
}