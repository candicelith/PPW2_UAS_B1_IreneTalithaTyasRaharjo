<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $transaksi_count = Transaksi::count();
        return view('dashboard', compact('transaksi_count'));
    }
}
