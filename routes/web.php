<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\orderhistorycontroller;


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

// Route::get('/orderhistory', function () {
//     return view('orderhistory');
// });

Route::get('/orderhistory',[App\Http\Controllers\OrderhistoryController::class,'index'])->name('orderhistory');


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('orderpage');
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
Route::get('/checkout/create','CheckoutController@create')->name('checkout.create');


Route::get('/home/edit/{user}','UserController@edit')->name('user.edit');
Route::patch('/home/edit/{user}/update','UserController@update')->name('user.update');

