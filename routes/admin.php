<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Totes les rutes d'administració requereixen el middleware 'admin'
Route::middleware(['auth', 'admin'])->group(function () {
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
    
    // Gestió d'estoc (ja existent)
    Route::get('/stock', [ProductController::class, 'stock'])->name('admin.stock');
});