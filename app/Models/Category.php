<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories'; // Nama tabel
    protected $primaryKey = 'id_kategori'; // Primary key
    public $timestamps = false; // Tabel tidak menggunakan timestamps
    protected $fillable = ['nama_kategori']; // Kolom yang dapat diisi

    // Relasi ke model Book
    public function books()
    {
        return $this->hasMany(Book::class, 'fk_id_kategori', 'id_kategori');
    }

