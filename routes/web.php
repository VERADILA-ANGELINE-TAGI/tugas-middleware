<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalProduk = DB::table('products')->count();
    $totalStok = DB::table('products')->sum('stok');
    $stokHabis = DB::table('products')->where('stok', 0)->count();
    $stokRendah = DB::table('products')->where('stok', '<=', 5)->count();
    $stokAman = DB::table('products')->where('stok', '>', 5)->count();
    $produkTerbaru = DB::table('products')
        ->select('id', 'nama as name', 'stok as stock', 'deskripsi as description', 'created_at')
        ->latest()
        ->take(5)
        ->get();
    $produkStokRendah = DB::table('products')
        ->select('id', 'nama as name', 'stok as stock', 'deskripsi as description')
        ->where('stok', '<=', 5)
        ->orderBy('stok')
        ->take(5)
        ->get();

    return view('dashboard', compact(
        'totalProduk',
        'totalStok',
        'stokHabis',
        'stokRendah',
        'stokAman',
        'produkTerbaru',
        'produkStokRendah'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/kasir', CashierController::class)
    ->middleware(['auth', 'role:kasir|admin'])
    ->name('kasir');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
});
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
