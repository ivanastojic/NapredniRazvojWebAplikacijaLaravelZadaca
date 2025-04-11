<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

// Prikaz svih proizvoda
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Prikaz forme za dodavanje proizvoda
Route::get('/products/store', [ProductController::class, 'create'])->name('products.create');

// Spremanje novog proizvoda (POST metoda)
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Uredjivanje proizvoda
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Ažuriranje proizvoda (PATCH metoda)
Route::patch('/products/{id}', [ProductController::class, 'update'])->name('products.update');  // Ovdje dodajemo rutu za ažuriranje

//Brisanje prizvoda
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::resource('categories', CategoryController::class);

Route::resource('colors', ColorController::class);
