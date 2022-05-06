<?php

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

Route::get('/', [\App\Http\Controllers\ClientController::class, 'home']);
Route::get('/shop', [\App\Http\Controllers\ClientController::class, 'shop']);
Route::get('/cart', [\App\Http\Controllers\ClientController::class, 'cart']);
Route::get('/checkout', [\App\Http\Controllers\ClientController::class, 'checkout']);


// Authentication routes
Route::get('/login', [\App\Http\Controllers\ClientController::class, 'login']);

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';*/


