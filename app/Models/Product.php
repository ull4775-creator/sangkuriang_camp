<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // DAFTAR KOLOM YANG DIIZINKAN UNTUK MASS ASSIGNMENT
    protected $fillable = [
        'name',
        'description',
        'price',
        'images',
        'specs',
        'includes',
        'is_best_seller'
    ];

    // OPSI: Jika ingin data JSON otomatis diubah jadi array/object saat diambil
    protected $casts = [
        'images' => 'array',
        'specs' => 'array',
        'includes' => 'array',
        'is_best_seller' => 'boolean',
    ];
}