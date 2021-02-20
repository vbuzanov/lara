<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Auth;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

// Route::get('/', 'MainController@index'); - laravel до 8 версии
Route::get('/', [MainController::class, 'index']);

// Route::get('/contacts', [MainController::class, 'contacts'])->middleware('auth');
Route::get('/contacts', [MainController::class, 'contacts']);

Route::post('/contacts', [MainController::class, 'getContacts']);
Route::get('/sale', [StoreController::class, 'sale']);
Route::get('/reviews', [MainController::class, 'reviews'])->name('review');
Route::post('/reviews', [MainController::class, 'getReviews']);
Route::get('/news', [MainController::class, 'news']);

Route::get('/category/{slug}', [StoreController::class, 'category']);
Route::get('/product/{product:slug}', [StoreController::class, 'product']);
Route::get('/newsnext/{slug}', [MainController::class, 'newsnext']);


Route::post('/cart/add', [CartController::class, 'add']);
Route::post('/cart/clear', [CartController::class, 'clear']);
Route::post('/cart/remove/{id}', [CartController::class, 'remove']);
Route::post('/cart/change-qty', [CartController::class, 'change']);

Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/checkout', [CheckoutController::class, 'checkoutSave']);



Auth::routes();


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/slider', SliderController::class);
});




Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});