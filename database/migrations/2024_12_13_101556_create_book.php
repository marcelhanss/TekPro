<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('book', function (Blueprint $table) {
            $table->id('id_buku'); // ID Buku
            $table->foreignId('fk_id_kategori')->constrained('categories', 'id_kategori')->onDelete('cascade'); // Kategori Buku
            $table->string('judul'); // Judul Buku
            $table->string('penulis'); // Penulis Buku
            $table->decimal('harga', 10, 2); // Harga Buku
            $table->integer('stok'); // Stok Buku
            $table->text('deskripsi')->nullable(); // Deskripsi Buku
            $table->string('gambar')->nullable(); // Gambar Buku (opsional)
            $table->integer('jumlah_terjual')->default(0); // Jumlah Terjual (default 0)
            $table->string('link_pdf')->nullable(); // Link PDF Buku (opsional)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
