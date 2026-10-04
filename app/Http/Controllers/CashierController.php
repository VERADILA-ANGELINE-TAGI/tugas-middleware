<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use JsonException;

class CashierController extends Controller
{
    /**
     * @throws JsonException
     */
    public function __invoke(): Response
    {
        $cashierPage = resource_path('kasir.html');

        abort_unless(is_file($cashierPage), 500, 'Halaman kasir tidak ditemukan.');

        $columns = Schema::hasColumn('products', 'nama')
            ? ['id', 'nama as name', 'harga as price', 'stok as stock']
            : ['id', 'name', 'price', 'stock'];

        if (Schema::hasColumn('products', 'barcode')) {
            $columns[] = 'barcode as code';
        }

        $products = DB::table('products')
            ->select($columns)
            ->get()
            ->map(fn (object $product): array => [
                'id' => (int) $product->id,
                'name' => $product->name,
                'code' => $product->code ?? (string) $product->id,
                'price' => (float) $product->price,
                'stock' => (int) $product->stock,
            ])
            ->all();

        $page = file_get_contents($cashierPage);
        abort_if($page === false, 500, 'Halaman kasir gagal dibaca.');

        $page = str_replace(
            '__CASHIER_PRODUCTS_JSON__',
            json_encode($products, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_THROW_ON_ERROR),
            $page,
        );

        return response($page)->header('Content-Type', 'text/html; charset=UTF-8');
    }
}
