<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use RuntimeException;

class ProductController extends Controller
{
    public function index(): View
    {
        $columns = Schema::hasColumn('products', 'nama')
            ? ['id', 'nama', 'harga', 'stok', 'deskripsi']
            : ['id', 'name as nama', 'price as harga', 'stock as stok', 'description as deskripsi'];
        if (Schema::hasColumn('products', 'image')) {
            $columns[] = 'image';
        }
        $products = DB::table('products')->select($columns)->get();
        if (Schema::hasColumn('products', 'image')) {
            $products->each(function (object $product): void {
                $product->image_url = $product->image
                    ? Storage::disk('public')->url($product->image)
                    : null;
            });
        }

        return view('products.index', [
            'products' => $products,
            'canManageProducts' => Auth::user()?->role === 'admin',
        ]);
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $product = $request->validated();
        if (!Schema::hasColumn('products', 'image')) {
            throw new RuntimeException('Kolom gambar produk belum tersedia. Jalankan php artisan migrate.');
        }

        $imagePath = $request->file('gambar')?->store('products', 'public');
        if ($request->hasFile('gambar') && $imagePath === false) {
            throw new RuntimeException('Gambar produk gagal disimpan.');
        }

        $attributes = Schema::hasColumn('products', 'nama')
            ? [
                'nama' => $product['nama'],
                'harga' => $product['harga'],
                'stok' => $product['stok'],
                'deskripsi' => $product['deskripsi'] ?? null,
                'image' => $imagePath,
            ]
            : [
                'name' => $product['nama'],
                'price' => $product['harga'],
                'stock' => $product['stok'],
                'description' => $product['deskripsi'] ?? null,
                'image' => $imagePath,
            ];

        DB::table('products')->insert([
            ...$attributes,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('products.index')
            ->with('status', 'Produk baru berhasil ditambahkan.');
    }
}