<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;

    // Define the relationship to Books
    public function book()
    {
        return $this->hasMany(Book::class, 'fk_id_kategori', 'id_kategori');
    }
}