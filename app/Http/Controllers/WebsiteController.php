<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        // PERBAIKAN PATH: Menggunakan app_path() untuk folder app/Data/
        $rawProducts = include app_path('Data/products_data.php');
        
        // FILTER DATA: Hanya ambil item yang benar-benar ARRAY
        // Ini mencegah error "Trying to access array offset on int"
        $products = collect($rawProducts)
            ->filter(fn($item) => is_array($item)) 
            ->values() 
            ->toArray();

        return view('welcome', compact('products'));
    }

    public function getProductDetail($id)
    {
        $rawProducts = include app_path('Data/products_data.php');
        $products = collect($rawProducts)->filter(fn($item) => is_array($item));
        $product = $products->firstWhere('id', (int)$id);

        if (!$product) abort(404);

        return response()->json($product);
    }
}