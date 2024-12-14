<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\signupController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sesi/login', function () {
    return view('/sesi/login');
});
Route::get('/sesi/home', function () {
    return view('/sesi/home');
});
Route::get('/admin/adminpage', function () {
    return view('/admin/adminpage');
});


Route::resource('/sesi/signup', signupController::class);

Route::get('/sesi/login', [loginController::class, 'index']);
Route::post('/sesi/login', [loginController::class, 'login']);
Route::get('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/books', [BookController::class, 'index'])->name('books.index');

Route::get('/sesi/home', [BookController::class, 'index']);

Route::get('/book/{id}', [BookController::class, 'show'])->name('book.detail');


Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/admin/create', [BookController::class, 'create'])->name('admin.create');
Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
Route::get('/book/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/book/{id}', [BookController::class, 'update'])->name('book.update');
Route::delete('/book/{id}', [BookController::class, 'destroy'])->name('book.delete');


Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
});

Route::get('/categories/{categoryId}', [BookController::class, 'showByCategory'])->name('books.byCategory');

Route::get('/sesi/home', [BookController::class, 'index'])->name('books.index');
