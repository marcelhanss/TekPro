<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
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

Route::get('/books', [BookController::class, 'index'])->name('books.index');

Route::get('/sesi/home', [BookController::class, 'index']);
