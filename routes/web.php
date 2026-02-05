<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;


Route::get('/pesan/export/pdf', [OrderController::class, 'exportPdf'])
    ->name('pesan.export.pdf');


Route::get('/', function () {
    return redirect()->route('product.index');
});

/* Product Routes */
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');

/* Order/Pesanan Routes */
Route::get('/pesan', [OrderController::class, 'index'])->name('pesan.index');
Route::get('/pesan/create', [OrderController::class, 'create'])->name('pesan.create');
Route::post('/pesan/store', [OrderController::class, 'store'])->name('pesan.store');
Route::get('/pesan/{pesan}/edit', [OrderController::class, 'edit'])->name('pesan.edit');
Route::put('/pesan/{pesan}/update', [OrderController::class, 'update'])->name('pesan.update');
Route::delete('/pesan/{pesan}/destroy', [OrderController::class, 'destroy'])->name('pesan.destroy');

Route::get('/pesan/{pesan}/edit', [OrderController::class, 'edit'])->name('pesan.edit');
Route::put('/pesan/{pesan}/update', [OrderController::class, 'update'])->name('pesan.update');
Route::delete('/pesan/{pesan}/destroy', [OrderController::class, 'destroy'])->name('pesan.destroy');
