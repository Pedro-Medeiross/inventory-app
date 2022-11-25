<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StoresController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('stores.index');
});

Route:: resource('stores', StoresController::class);
Route:: resource('products', ProductsController::class);
Route::get('products/create/{store}', [ProductsController::class, 'create'])->name('products.create');
Route::get('products/{product}/edit', [ProductsController::class, 'edit'])->name('products.edit');
