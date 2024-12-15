<?php

// database/migrations/xxxx_xx_xx_create_carts_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id('id_cart');
            $table->foreignId('id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users
            $table->unsignedBigInteger('id_buku'); // Kolom id_buku
            $table->foreign('id_buku')->references('id_buku')->on('book')->onDelete('cascade'); // Relasi ke id_buku di tabel book
            $table->integer('quantity')->default(1); // Jumlah item
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
