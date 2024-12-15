<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\signupController;
use App\Http\Controllers\CartController;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/sesi/login', function () {
//     return view('/sesi/login');
// });
// Route::get('/sesi/home', function () {
//     return view('/sesi/home');
// });
// Route::get('/book/best-seller', function () {
//     return view('/book/best-seller');
// });


Route::resource('/sesi/signup', signupController::class);


Route::get('/sesi/login', [loginController::class, 'index']);
Route::post('/sesi/login', [loginController::class, 'login']);
Route::get('/logout', [loginController::class, 'logout'])->name('logout');



Route::get('/', [BookController::class, 'admin']);
Route::get('/sesi/home', [BookController::class, 'index']);
Route::get('/book/{id}', [BookController::class, 'show'])->name('book.detail');

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/admin/create', [BookController::class, 'create'])->name('admin.create');
Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
Route::get('/book/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/book/{id}', [BookController::class, 'update'])->name('book.update');
Route::delete('/book/{id}', [BookController::class, 'destroy'])->name('book.delete');

Route::get('/categories/{categoryId}', [BookController::class, 'showByCategory'])->name('books.byCategory');
Route::get('/sesi/home', [BookController::class, 'index'])->name('books.index');
// Route untuk menambah buku ke keranjang
Route::post('/cart/add/{id}', [BookController::class, 'addToCart'])->name('cart.add');
// Route untuk menampilkan keranjang
Route::get('/cart', [BookController::class, 'showCart'])->name('cart.index');
// Route untuk checkout
Route::get('/cart/checkout', [BookController::class, 'checkout'])->name('cart.checkout');


// Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login'])->name('login.post');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::put('/cart/update-quantity/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
// Route::delete('/cart/remove-item/{id}', [CartController::class, 'removeItem'])->name('cart.removeItem');


Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/checkout', [CartController::class, 'processCheckout'])->name('cart.processCheckout');

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'showCart'])->name('cart.showCart');
    Route::post('cart/{bookId}', [CartController::class, 'addToCart'])->name('cart.addToCart');
    Route::put('cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    // Route::delete('cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.removeItem');
    Route::get('cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/{bookId}/add', [CartController::class, 'addToCart'])->name('cart.add');
});

Route::delete('/cart/{id}', [CartController::class, 'removeItem'])->name('cart.removeItem');

// Route::put('/cart/update-quantity/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
// Route::delete('/cart/remove-item/{id}', [CartController::class, 'removeItem'])->name('cart.removeItem');
// Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');


Route::post('cart/{bookId}', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::put('cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
// Route::delete('cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.removeItem');
Route::get('cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
