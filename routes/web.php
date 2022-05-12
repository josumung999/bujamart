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

// Authentication routes
Route::get('/login', [\App\Http\Controllers\ClientController::class, 'login']);
Route::get('/signup', [\App\Http\Controllers\ClientController::class, 'signup']);

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';*/


// Client Routes
Route::get('/', [\App\Http\Controllers\ClientController::class, 'home']);
Route::get('/shop', [\App\Http\Controllers\ClientController::class, 'shop']);
Route::get('/cart', [\App\Http\Controllers\ClientController::class, 'cart']);
Route::get('/checkout', [\App\Http\Controllers\ClientController::class, 'checkout']);




// Admin Routes

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'admin']);
Route::get('/addcategory', [\App\Http\Controllers\CategoryController::class, 'add_category']);
Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'categories']);
Route::get('/addslider', [\App\Http\Controllers\SliderController::class, 'add_slider']);
Route::get('/sliders', [\App\Http\Controllers\SliderController::class, 'sliders']);

