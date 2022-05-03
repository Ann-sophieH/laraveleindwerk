<?php

use App\Http\Controllers\SocialiteLoginController;
use App\Http\Livewire\Products;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MollieController;
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
Auth::routes(['verify'=>true]); //verified email

/**FRONTEND**/

/** payments **/

/** socialite logins **/
Route::get('login/github', [SocialiteLoginController::class, 'redirectToGit']);
Route::get('login/github/callback', [SocialiteLoginController::class, 'handleGitCallback']);
Route::get('/login/google', [SocialiteLoginController::class, 'redirectToGoogle']);
Route::get('/login/google/callback', [SocialiteLoginController::class, 'handleGoogleCallback']);

Route::get('/', 'App\Http\Controllers\FrontendController@index')->name('home ');
Route::get('/blog', 'App\Http\Controllers\FrontendController@blog')->name('blog ');
/** contact **/
Route::get('/contact', 'App\Http\Controllers\ContactController@contact')->name('contact');
Route::get('/contactformulier', 'App\Http\Controllers\ContactController@create');
Route::post('/contactformulier', 'App\Http\Controllers\ContactController@store');
/** product pages  **/
//Route::get('/products', 'App\Http\Controllers\FrontendController@products')->name('products');
Route::get('/speakers', 'App\Http\Controllers\FrontendController@speakers')->name('speakers');
Route::get('/speakers/type/{type:slug}', '\App\Http\Controllers\FrontendController@speakersPerType')->name('speakersPerType');
Route::get('/headphones', 'App\Http\Controllers\FrontendController@headphones')->name('headphones');
Route::get('/headphones/type/{type:slug}', '\App\Http\Controllers\FrontendController@headphonesPerType')->name('headphonesPerType');

Route::get('/products/{product:slug}', 'App\Http\Controllers\FrontendController@details')->name('details');
Route::get('/products', Products::class)->name('products');
//Route::post('/addtocart', 'App\Http\Controllers\FrontendController@addToCart')->name('addToCart');

/** cart & checkout / payment  **/
Route::get('/cart', '\App\Http\Controllers\FrontendController@cart' )->name('cart');
Route::get('/checkout','App\Http\Controllers\FrontendController@checkout')->name('checkout');

Route::post('/checkout', 'App\Http\Controllers\FrontendController@order')->name('pay.order');
Route::get('payment-success','App\Http\Controllers\FrontendController@paymentSuccess')->name('payment.success');



/**BACKEND**/
/** only admin **/
Route::group(['prefix' => 'admin', 'middleware'=> 'admin'], function (){

    Route::resource('users', App\Http\Controllers\AdminUsersController::class);
    Route::get('users/restore/{user}', 'App\Http\Controllers\AdminUsersController@restore')->name('users.restore');
    Route::get('users/edit/{user}', 'App\Http\Controllers\AdminUsersController@edit')->name('users.edit');
    Route::get('users/roles/{id}', '\App\Http\Controllers\AdminUsersController@usersPerRole')->name('admin.usersPerRole');

    Route::resource('addresses', App\Http\Controllers\AdminAddressesController::class);
    Route::get('addresses/restore/{address}', 'App\Http\Controllers\AdminAddressesController@restore')->name('addresses.restore');
    Route::get('addresses/create/{id}', 'App\Http\Controllers\AdminAddressesController@create')->name('addresses.create');

    Route::resource('products', App\Http\Controllers\AdminProductsController::class);
    Route::get('products/restore/{product}', 'App\Http\Controllers\AdminProductsController@restore')->name('products.restore');

    Route::get('products/categories/{id}', '\App\Http\Controllers\AdminProductsController@productsPerCat')->name('admin.productsPerCat');
    Route::resource('reviews', \App\Http\Controllers\AdminProductReviewsController::class);

    Route::resource('colors', App\Http\Controllers\AdminColorsController::class);
    Route::get('colors/restore/{id}', 'App\Http\Controllers\AdminColorsController@restore')->name('colors.restore');

    Route::resource('specifications', App\Http\Controllers\AdminSpecificationsController::class);
    Route::get('specifications/restore/{id}', 'App\Http\Controllers\AdminSpecificationsController@restore')->name('specifications.restore');


});
/**  **/
/** ALL: admin + author + subscriber & verified email **/
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'verified']], function (){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('homebackend');

    Route::resource('photos', App\Http\Controllers\AdminPhotosController::class);

});

