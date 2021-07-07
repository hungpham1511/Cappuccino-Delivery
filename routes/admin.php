<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;


Route::get('/login','Auth\AdminAuthController@getLogin')->name('adminLogin');
Route::post('/login', 'Auth\AdminAuthController@postLogin')->name('adminLoginPost');
Route::get('/logout', 'Auth\AdminAuthController@logout')->name('adminLogout');

Route::group(['middleware' => 'adminauth'], function () {
	// Admin Dashboard
	Route::get('dashboard','AdminController@dashboard')->name('dashboard');	
});

Route::group(['middleware' => 'adminauth'], function () {
	// Admin menu control
	Route::get('/menu','MenuController@index')->name('menu.index');
	Route::get('/menu/create','MenuController@create')->name('menu.create');
	Route::post('/menu/store','MenuController@store')->name('menu.store');
	Route::get('/menu/{drink}/edit','MenuController@edit')->name('menu.edit');
	Route::put('/menu/{drink}','MenuController@update')->name('menu.update');
	Route::delete('/menu/{drink}','MenuController@destroy')->name('menu.destroy');
});

Route::group(['middleware' => 'adminauth'], function () {
	// Admin user control
	Route::get('/customers','UserManagementController@index')->name('customers.index');
	Route::get('/customers/create','UserManagementController@create')->name('customers.create');
	Route::post('/customers/store','UserManagementController@store')->name('customers.store');
	Route::delete('/customers/{customer}','UserManagementController@destroy')->name('customers.destroy');
});

Route::group(['middleware' => 'adminauth'], function () {
	// Admin receipt control
	Route::get('/receipts','ReceiptController@index')->name('receipts.index');
	Route::get('/receipts/create','ReceiptController@create')->name('receipts.create');
	Route::post('/receipts/store','ReceiptController@store')->name('receipts.store');
	Route::get('/receipts/{receipt}/show','ReceiptController@show')->name('receipts.show');
	Route::get('/receipts/{receipt}/edit','ReceiptController@edit')->name('receipts.edit');
	Route::put('/receipts/{receipt}','ReceiptController@update')->name('receipts.update');
	Route::delete('/receipts/{receipt}','ReceiptController@destroy')->name('receipts.destroy');
});

Route::group(['middleware' => 'adminauth'], function () {
	// Admin topping control
	Route::get('/topping','ToppingController@index')->name('topping.index');
	Route::get('/topping/create','ToppingController@create')->name('topping.create');
	Route::post('/topping/store','ToppingController@store')->name('topping.store');
	Route::get('/topping/{data}/edit','ToppingController@edit')->name('topping.edit');
	Route::put('/topping/{data}','ToppingController@update')->name('topping.update');
	Route::delete('/topping/{data}','ToppingController@destroy')->name('topping.destroy');
});

Route::group(['middleware' => 'adminauth'], function () {
	// Admin menu control
	Route::get('/promotion','PromotionController@index')->name('promotion.index');
	Route::get('/promotion/create','PromotionController@create')->name('promotion.create');
	Route::post('/promotion/store','PromotionController@store')->name('promotion.store');
	Route::get('/promotion/{data}/edit','PromotionController@edit')->name('promotion.edit');
	Route::put('/promotion/{data}','PromotionController@update')->name('promotion.update');
	Route::delete('/promotion/{data}','PromotionController@destroy')->name('promotion.destroy');
});