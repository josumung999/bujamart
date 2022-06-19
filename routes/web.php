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

// Client Authentication routes
Route::get('/login', [\App\Http\Controllers\ClientController::class, 'login']);
Route::post('/access_account', [\App\Http\Controllers\ClientController::class, 'access_account']);
Route::get('/signup', [\App\Http\Controllers\ClientController::class, 'signup']);
Route::post('/create_account', [\App\Http\Controllers\ClientController::class, 'create_account']);
Route::get('/logout', [\App\Http\Controllers\ClientController::class, 'logout']);

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';*/


// Client Routes
Route::get('/', [\App\Http\Controllers\ClientController::class, 'home']);
Route::get('/shop', [\App\Http\Controllers\ClientController::class, 'shop']);
Route::get('/addtocart/{id}', [\App\Http\Controllers\ClientController::class, 'addtocart']);
Route::post('/update_qty/{id}', [\App\Http\Controllers\ClientController::class, 'update_qty']);
Route::get('/remove_from_cart/{id}', [\App\Http\Controllers\ClientController::class, 'remove_from_cart']);
Route::get('/cart', [\App\Http\Controllers\ClientController::class, 'cart']);
Route::post('place-order', [\App\Http\Controllers\ClientController::class, 'place_order']);
Route::get('/checkout', [\App\Http\Controllers\ClientController::class, 'checkout']);

// Stripe Payment routes
Route::get('/stripe', [\App\Http\Controllers\ClientController::class, 'stripe']);
Route::post('/stripe', [\App\Http\Controllers\ClientController::class, 'stripePost'])->name('stripe.post');


// Get the PDF invoice order
Route::get('/view-pdf/{id}', [\App\Http\Controllers\PdfController::class, 'view_pdf']);


/*
    ADMIN ROUTES
*/

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'admin']);

// Routes for categories
Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'categories']);
Route::get('/addcategory', [\App\Http\Controllers\CategoryController::class, 'add_category']);
Route::post('/savecategory', [\App\Http\Controllers\CategoryController::class, 'savecategory']);
Route::get('/edit-category/{id}', [\App\Http\Controllers\CategoryController::class, 'edit_category']);
Route::post('/updatecategory', [\App\Http\Controllers\CategoryController::class, 'updatecategory']);
Route::get('/delete-category/{id}', [\App\Http\Controllers\CategoryController::class, 'delete_category']);

// Routes for sliders
Route::get('/sliders', [\App\Http\Controllers\SliderController::class, 'sliders']);
Route::get('/addslider', [\App\Http\Controllers\SliderController::class, 'add_slider']);
Route::post('/saveslider', [\App\Http\Controllers\SliderController::class, 'saveslider']);
Route::get('/edit-slider/{id}', [\App\Http\Controllers\SliderController::class, 'edit_slider']);
Route::post('/updateslider', [\App\Http\Controllers\SliderController::class, 'updateslider']);
Route::get('/delete-slider/{id}', [\App\Http\Controllers\SliderController::class, 'delete_slider']);
Route::get('/activate-slider/{id}', [\App\Http\Controllers\SliderController::class, 'activate_slider']);
Route::get('/unactivate-slider/{id}', [\App\Http\Controllers\SliderController::class, 'unactivate_slider']);

// Routes for Products
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'products']);
Route::get('/addproduct', [\App\Http\Controllers\ProductController::class, 'addproduct']);
Route::post('/saveproduct', [\App\Http\Controllers\ProductController::class, 'saveproduct']);
Route::get('/edit-product/{id}', [\App\Http\Controllers\ProductController::class, 'edit_product']);
Route::post('/updateproduct', [\App\Http\Controllers\ProductController::class, 'updateproduct']);
Route::get('/delete-product/{id}', [\App\Http\Controllers\ProductController::class, 'delete_product']);
Route::get('/activate-product/{id}', [\App\Http\Controllers\ProductController::class, 'activate_product']);
Route::get('/unactivate-product/{id}', [\App\Http\Controllers\ProductController::class, 'unactivate_product']);
// Filtering products by categories
Route::get('/products/category/{category_name}', [\App\Http\Controllers\ProductController::class, 'view_products_by_category']);

// Routes for orders
Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'orders']);


