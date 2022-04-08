<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes(['verify'=>true]); //verified email

/**FRONTEND**/
Route::get('/', function () {
    return view('index');
});
Route::get('/contactformulier', 'App\Http\Controllers\ContactController@create');
Route::post('/contactformulier', 'App\Http\Controllers\ContactController@store');


Route::get('/products', 'App\Http\Controllers\AdminProductsController@products')->name('products');

/**BACKEND**/
/** only admin **/
Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function (){

    Route::resource('users', App\Http\Controllers\AdminUsersController::class);
    Route::get('users/restore/{user}', 'App\Http\Controllers\AdminUsersController@restore')->name('users.restore');
    Route::get('users/edit/{user}', 'App\Http\Controllers\AdminUsersController@edit')->name('users.edit');
    Route::get('users/roles/{id}', '\App\Http\Controllers\AdminUsersController@usersPerRole')->name('admin.usersPerRole');

    Route::resource('addresses', App\Http\Controllers\AdminAddressesController::class);

    Route::resource('products', App\Http\Controllers\AdminProductsController::class);
    Route::resource('colors', App\Http\Controllers\AdminColorsController::class);
    Route::resource('specifications', App\Http\Controllers\AdminSpecificationsController::class);


});
/**  **/
/** ALL: admin + author + subscriber & verified email **/
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'verified']], function (){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('homebackend');

    Route::resource('photos', App\Http\Controllers\AdminPhotosController::class);

});

