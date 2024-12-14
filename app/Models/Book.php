<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'book'; // Nama tabel di database
    protected $primaryKey = 'id_buku'; // Primary key
    public $timestamps = false; // Nonaktifkan timestamp jika tidak ada created_at dan updated_at

    // Tambahkan properti fillable untuk mass assignment
    protected $fillable = [
        'judul',
        'penulis',
        'harga',
        'stok',
        'deskripsi',
        'gambar',
        'link',
        'fk_id_kategori',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'fk_id_kategori', 'id_kategori');
    }
}