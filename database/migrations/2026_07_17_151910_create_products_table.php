<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('price'); // Contoh: "450K / Malam"
            $table->json('images')->nullable(); // Simpan array nama file gambar
            $table->json('specs')->nullable();  // Simpan spesifikasi teknis
            $table->json('includes')->nullable(); // Simpan daftar kelengkapan
            $table->boolean('is_best_seller')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};