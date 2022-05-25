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




/*
    ADMIN ROUTES
*/

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'admin']);

// Routes for categories
Route::get('/addcategory', [\App\Http\Controllers\CategoryController::class, 'add_category']);
Route::post('/savecategory', [\App\Http\Controllers\CategoryController::class, 'savecategory']);
Route::get('/edit-category/{id}', [\App\Http\Controllers\CategoryController::class, 'edit_category']);
Route::post('/updatecategory', [\App\Http\Controllers\CategoryController::class, 'updatecategory']);
Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'categories']);
Route::get('/delete-category/{id}', [\App\Http\Controllers\CategoryController::class, 'delete_category']);

// Routes for sliders
Route::get('/addslider', [\App\Http\Controllers\SliderController::class, 'add_slider']);
Route::get('/sliders', [\App\Http\Controllers\SliderController::class, 'sliders']);

// Routes for Products
Route::get('/addproduct', [\App\Http\Controllers\ProductController::class, 'addproduct']);
Route::post('/saveproduct', [\App\Http\Controllers\ProductController::class, 'saveproduct']);
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'products']);

// Routes for orders
Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'orders']);


