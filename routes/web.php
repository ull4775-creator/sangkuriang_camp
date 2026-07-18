<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/api/product/{id}', [WebsiteController::class, 'getProductDetail'])->name('product.detail');