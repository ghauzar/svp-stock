<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Product::count();

        $totalKategori = Category::count();

        $totalTransaksi = Transaction::count();

        $stokMenipis = Product::whereColumn(
            'stok_total',
            '<=',
            'stok_minimum'
        )->count();

        $barangMenipis = Product::whereColumn(
            'stok_total',
            '<=',
            'stok_minimum'
        )
        ->latest()
        ->take(5)
        ->get();

        return view(
            'dashboard',
            compact(
                'totalBarang',
                'totalKategori',
                'totalTransaksi',
                'stokMenipis',
                'barangMenipis'
            )
        );
    }
}