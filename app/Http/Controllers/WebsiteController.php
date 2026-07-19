<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        // Load data products dengan path absolut
        $products = require base_path('app/Data/products_data.php');
        
        // Filter hanya array untuk mencegah error
        $products = collect($products)
            ->filter(fn($item) => is_array($item)) 
            ->values() 
            ->toArray();

        return view('welcome', compact('products'));
    }

    public function getProductDetail($id)
    {
        $products = require base_path('app/Data/products_data.php');
        $product = collect($products)->firstWhere('id', (int)$id);

        if (!$product) abort(404);

        return response()->json($product);
    }
}