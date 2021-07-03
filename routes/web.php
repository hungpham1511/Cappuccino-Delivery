<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\UserController;
<<<<<<< HEAD
=======

>>>>>>> a30d2504ebd380c558056cb30d77f94fe8ad0810


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
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('orderpage');
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
Route::get('/checkout/create','CheckoutController@create')->name('checkout.create');
<<<<<<< HEAD


Route::get('/home/edit/{user}','UserController@edit')->name('user.edit');
Route::patch('/home/edit/{user}/update','UserController@update')->name('user.update');
=======
Route::get('/home/edit',[App\Http\Controllers\UserController::class, 'index'])->name('edituser');

// Route::group(['middleware' => 'adminauth'], function () {
// 	// User
// 	Route::get('/customers','UserController@index')->name('customers.index');
// 	Route::get('/customers/{customer}/edit','UserController@edit')->name('customers.edit');
// 	Route::put('/customers/{customer}','UserController@update')->name('customers.update');
// });
>>>>>>> a30d2504ebd380c558056cb30d77f94fe8ad0810
