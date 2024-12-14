<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false; // Jika tabel tidak memiliki kolom `created_at` dan `updated_at`

    protected $fillable = ['username', 'password', 'isAdmin'];

    protected $hidden = ['password'];

    // Accessor untuk memudahkan pengecekan peran admin
    public function getIsAdminAttribute()
    {
        return $this->attributes['isAdmin'] == 1;
    }
}
