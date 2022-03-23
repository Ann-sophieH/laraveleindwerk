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

/*Route::get('/', function () {
    return view('welcome');
});*/


Auth::routes();


/**FRONTEND**/
Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\FrontendController::class, 'products'])->name('products');


/**BACKEND**/
Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function (){
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('homebackend');

    Route::resource('users', App\Http\Controllers\AdminUsersController::class);
    Route::get('users/restore/{user}', 'App\Http\Controllers\AdminUsersController@restore')->name('users.restore');

    Route::get('users/edit/{user}', 'App\Http\Controllers\AdminUsersController@edit')->name('users.edit');

    Route::resource('photos', App\Http\Controllers\AdminPhotosController::class);

    Route::resource('products', App\Http\Controllers\AdminProductsController::class);

});
