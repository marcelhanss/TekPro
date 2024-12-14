<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\Categories;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Halaman utama dashboard admin.
     */
    public function index()
    {
        $bookCount = Book::count();
        $userCount = User::count();
        $categoryCount = Category::count();

        return view('admin.dashboard', compact('bookCount', 'userCount', 'categoryCount'));
    }

    /**
     * Menampilkan daftar buku untuk dikelola oleh admin.
     */
    public function manageBooks()
    {
        $books = Book::all();
        return view('admin.manage_books', compact('books'));
    }

    /**
     * Menampilkan daftar pengguna untuk dikelola oleh admin.
     */
    public function manageUsers()
    {
        $users = User::all();
        return view('admin.manage_users', compact('users'));
    }

    /**
     * Menampilkan daftar kategori untuk dikelola oleh admin.
     */
    public function manageCategories()
    {
        $categories = Category::all();
        return view('admin.manage_categories', compact('categories'));
    }
}