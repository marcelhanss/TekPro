<?php

// app/Models/Cart.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $primaryKey = 'id_cart'; // Primary key
    public $timestamps = false;

    protected $fillable = [
        'id', // ID pengguna
        'id_buku', // ID buku
        'quantity', // Jumlah buku di keranjang
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id'); // Relasi ke User
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'id_buku', 'id_buku'); // Relasi ke Book
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'id_buku', 'id_buku'); // Relasi ke Cart
    }
}
