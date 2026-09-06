<?php

namespace App\Http\Controllers;

use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        $totalProduk = Product::count();

        $totalStok = Product::sum('stok');

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalStok'
        ));
    }
}