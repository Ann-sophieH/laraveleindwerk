<?php

use App\Http\Controllers\SocialiteLoginController;
use App\Http\Livewire\Products;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MollieController;
use Illuminate\Support\Facades\Session;

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
Route::get('/', 'App\Http\Controllers\FrontendController@index')->name('home ');

/** socialite logins **/
Route::get('login/github', [SocialiteLoginController::class, 'redirectToGit']);
Route::get('login/github/callback', [SocialiteLoginController::class, 'handleGitCallback']);
Route::get('/login/google', [SocialiteLoginController::class, 'redirectToGoogle']);
Route::get('/login/google/callback', [SocialiteLoginController::class, 'handleGoogleCallback']);

//Route::get('/blog', 'App\Http\Controllers\FrontendController@blog')->name('blog ');
/** contact **/
Route::get('/contact', 'App\Http\Controllers\ContactController@contact')->name('contact');
Route::get('/contactformulier', 'App\Http\Controllers\ContactController@create');
Route::post('/contactformulier', 'App\Http\Controllers\ContactController@store');
/** product pages  **/
//Route::get('/products', 'App\Http\Controllers\FrontendController@products')->name('products');
//Route::get('/speakers', 'App\Http\Controllers\FrontendController@speakers')->name('speakers');
//Route::get('/speakers/type/{type:slug}', '\App\Http\Controllers\FrontendController@speakersPerType')->name('speakersPerType');
//Route::get('/headphones', 'App\Http\Controllers\FrontendController@headphones')->name('headphones');
//Route::get('/headphones/type/{type:slug}', '\App\Http\Controllers\FrontendController@headphonesPerType')->name('headphonesPerType');

Route::get('/products/{product:slug}', 'App\Http\Controllers\FrontendController@details')->name('details');
Route::get('/products', Products::class)->name('products');
/** info pages  **/

Route::get('/faq', '\App\Http\Controllers\FrontendController@faq' )->name('faq');
Route::post('/newsletter', '\App\Http\Controllers\FrontendController@newsletter' )->name('newsletter');
Route::get('/blog', '\App\Http\Controllers\FrontendController@blog' )->name('blog');
Route::get('/blog/{post:slug}', '\App\Http\Controllers\FrontendController@blogpost' )->name('blogpost');

/** cart **/
Route::get('/cart', '\App\Http\Controllers\FrontendController@cart' )->name('cart');
/** coupon code **/
Route::post('/discount/', 'App\Http\Controllers\AdminCouponController@coupon');
/** payment **/
Route::post('/checkout', 'App\Http\Controllers\FrontendController@order')->name('pay.order');
Route::get('/received', 'App\Http\Controllers\FrontendController@orderReceived')->name('orderReceived');

Route::get('payment-success','App\Http\Controllers\FrontendController@paymentSuccess')->name('payment.success');



/**BACKEND**/

/** only role: admin -> always full access  **/
Route::group(['prefix' => 'admin', 'middleware'=> 'admin'], function (){

    /** relations management (sensitive only admin f.e. addresses ) **/
    Route::get('users/restore/{user}', 'App\Http\Controllers\AdminUsersController@restore')->name('users.restore');
    Route::get('users/edit/{user}', 'App\Http\Controllers\AdminUsersController@edit')->name('users.edit');
    Route::post('users/changestatus/{user}', 'App\Http\Controllers\AdminUsersController@changestatus')->name('users.status');

    Route::resource('addresses', App\Http\Controllers\AdminAddressesController::class);
    Route::get('addresses/restore/{address}', 'App\Http\Controllers\AdminAddressesController@restore')->name('addresses.restore');

    /** E-commerce access **/
    Route::get('products/restore/{product}', 'App\Http\Controllers\AdminProductsController@restore')->name('products.restore');
    Route::get('products/delete/{product}', 'App\Http\Controllers\AdminProductsController@delete')->name('products.delete');
    Route::get('colors/restore/{id}', 'App\Http\Controllers\AdminColorsController@restore')->name('colors.restore');
    Route::get('specifications/restore/{id}', 'App\Http\Controllers\AdminSpecificationsController@restore')->name('specifications.restore');

  //  Route::resource('roles', \App\Http\Controllers\AdminRolesController::class);

   // Route::resource('colors', App\Http\Controllers\AdminColorsController::class);
    //Route::get('colors/restore/{id}', 'App\Http\Controllers\AdminColorsController@restore')->name('colors.restore');

    //Route::resource('specifications', App\Http\Controllers\AdminSpecificationsController::class);
    //Route::get('specifications/restore/{id}', 'App\Http\Controllers\AdminSpecificationsController@restore')->name('specifications.restore');

});
/**  **/
/** ALL roles can access but REQUIRED: verified email **/
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'verified']], function (){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('homebackend');
    Route::resource('photos', App\Http\Controllers\AdminPhotosController::class);

/** what authors can still do in... **/
    /** Relations :  only view list users & only view own info in detail   **/
    Route::resource('users', App\Http\Controllers\AdminUsersController::class);
    Route::get('users/roles/{id}', '\App\Http\Controllers\AdminUsersController@usersPerRole')->name('admin.usersPerRole');
    Route::get('users/edit/{user}', 'App\Http\Controllers\AdminUsersController@edit')->name('users.edit');//can only edit OWN
    Route::get('users/show/{user}', 'App\Http\Controllers\AdminUsersController@show')->name('users.show');//can only view OWN
    /** E-commerce : policies to make sure guests so not access these routes **/

    Route::resource('products', App\Http\Controllers\AdminProductsController::class);
    Route::get('products/categories/{id}', '\App\Http\Controllers\AdminProductsController@productsPerCat')->name('admin.productsPerCat');
    Route::resource('colors', App\Http\Controllers\AdminColorsController::class);

    Route::resource('specifications', App\Http\Controllers\AdminSpecificationsController::class);

    Route::resource('orders', App\Http\Controllers\AdminOrdersController::class);
    /** Content management access: AUTHOR meant to write content so full access **/
    Route::resource('posts', App\Http\Controllers\AdminPostsController::class);
    Route::get('posts/restore/{post}', 'App\Http\Controllers\AdminPostsController@restore')->name('posts.restore');

    Route::resource('comments', \App\Http\Controllers\AdminPostCommentsController::class);

    Route::resource('reviews', \App\Http\Controllers\AdminProductReviewsController::class);

});

/** ALL roles can checkout order when logged in: admin + author + subscriber & REQUIRED: verified email **/
Route::group([ 'middleware'=>['auth', 'verified']], function (){
    Route::get('/checkout','App\Http\Controllers\FrontendController@checkout')->name('checkout');
});
