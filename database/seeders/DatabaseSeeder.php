<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'isAdmin' => 1, // Admin
        ]);

        User::create([
            'username' => 'user',
            'password' => bcrypt('user123'),
            'isAdmin' => 0, // User
        ]);
    }
}