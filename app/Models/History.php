<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'histories';
    protected $primaryKey = 'id_history';
    public $timestamps = false;
    protected $fillable = [
        'fk_user_id',
        'fk_book_id',
        'link_pdf',
    ];

    public function book()
{
    return $this->belongsTo(Book::class, 'fk_book_id', 'id_buku');
}

public function user()
{
    return $this->belongsTo(User::class, 'fk_user_id', 'id');
}
}

