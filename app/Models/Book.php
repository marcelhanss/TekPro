<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'book'; // Nama tabel di database
    protected $primaryKey = 'id_buku'; // Nama kolom primary key
    public $timestamps = false; // Jika tabel tidak menggunakan created_at dan updated_at
}
