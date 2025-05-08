<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;

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

Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
    ->middleware(['signed'])
    ->name('verification.verify');

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

Route::post('/order', [OrderController::class, 'store'])->name('order.store');

Route::get('/producto/{id}', [ProductController::class, 'show'])->name('producto');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/perfil', [ProfileController::class, 'show'])->name('profile.show');
Route::put('/perfil', [ProfileController::class, 'update'])->name('profile.update');

// Rutes d'administració protegides amb middleware 'admin'
Route::prefix('admin')->middleware(AdminMiddleware::class)->group(function () {
    // Panell d'administració
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Gestió de categories
    Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categories');
    Route::get('/categories/create', [AdminController::class, 'createCategory'])->name('admin.categories.create');
    Route::post('/categories', [AdminController::class, 'storeCategory'])->name('admin.categories.store');
    Route::get('/categories/{id}/edit', [AdminController::class, 'editCategory'])->name('admin.categories.edit');
    Route::put('/categories/{id}', [AdminController::class, 'updateCategory'])->name('admin.categories.update');
    Route::delete('/categories/{id}', [AdminController::class, 'deleteCategory'])->name('admin.categories.delete');

    // Gestió de subcategories
    Route::get('/subcategories', [AdminController::class, 'subcategories'])->name('admin.subcategories');
    Route::get('/subcategories/create', [AdminController::class, 'createSubcategory'])->name('admin.subcategories.create');
    Route::post('/subcategories', [AdminController::class, 'storeSubcategory'])->name('admin.subcategories.store');
    Route::get('/subcategories/{id}/edit', [AdminController::class, 'editSubcategory'])->name('admin.subcategories.edit');
    Route::put('/subcategories/{id}', [AdminController::class, 'updateSubcategory'])->name('admin.subcategories.update');
    Route::delete('/subcategories/{id}', [AdminController::class, 'deleteSubcategory'])->name('admin.subcategories.delete');

    // Gestió de productes
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/products/create', [AdminController::class, 'createProduct'])->name('admin.products.create');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
    Route::put('/products/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
    Route::delete('/products/{id}', [AdminController::class, 'deleteProduct'])->name('admin.products.delete');

    // Gestió d'usuaris
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

    // Gestió d'estoc
    Route::get('/stock', [ProductController::class, 'stock'])->name('admin.stock');
    Route::post('/stock/{id}', [ProductController::class, 'updateStock'])->name('products.updateStock');
    Route::post('/discount', [ProductController::class, 'applyDiscount'])->name('products.applyDiscount');
    Route::post('/discountToProd/{id}', [ProductController::class, 'applyDiscountToProduct'])->name('products.applyDiscountToProduct');
});


