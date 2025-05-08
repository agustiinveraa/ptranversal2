<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/contacto', function () {
    return view('pages.contact');
})->name('contacto');

Route::get('/catalogo', [ProductController::class, 'index'])->name('catalogo');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Rutas de autenticación
Route::post('/api/login', [AuthController::class, 'login'])->name('loginUser');
Route::post('/api/register', [AuthController::class, 'register'])->name('registerUser');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/sobre-nosotros', function () {
    return view('pages.about');
})->name('sobre-nosotros');

Route::get('/politica-cookies', function () {
    return view('pages.policies.cookie-policy');
})->name('politica-cookies');

Route::get('/politica-privacidad', function () {
    return view('pages.policies.privacy-policy');
})->name('politica-privacidad');

Route::get('/terminos-de-uso', function () {
    return view('pages.policies.terms-of-use');
})->name('terminos-de-uso');

Route::get('/carrito', function () {
    return view('pages.cart');
})->name('carrito');

Route::get('/checkout', function () {
    return view('pages.checkout');
})->name('checkout');

Route::get('/producto/{id}', [ProductController::class, 'show'])->name('producto');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/admin/stock', [ProductController::class, 'stock'])->name('admin.stock');
Route::post('/admin/stock/{id}', [ProductController::class, 'updateStock'])->name('products.updateStock');
Route::post('/admin/discount', [ProductController::class, 'applyDiscount'])->name('products.applyDiscount');
Route::post('/admin/discountToProd/{id}', [ProductController::class, 'applyDiscountToProduct'])->name('products.applyDiscountToProduct');

