<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use  App\Http\Controllers\ProductController;

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


Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product', [ProductController::class, 'index'])->name('index');
Route::post('/product', [ProductController::class, 'store'])->name('store');
Route::get('product/{id}', [ProductController::class, 'show'])->name('show');
Route::put('product/{id}',[ProductController::class, 'update'])->name('update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('delete');
