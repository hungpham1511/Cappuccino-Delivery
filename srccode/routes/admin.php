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
	Route::get('/customers/{customer}/edit','UserManagementController@edit')->name('customers.edit');
	Route::put('/customers/{customer}','UserManagementController@update')->name('customers.update');
	Route::delete('/customers/{customer}','UserManagementController@destroy')->name('customers.destroy');
});

Route::group(['middleware' => 'adminauth'], function () {
	// Admin order control
	Route::get('/orders','OrderController@index')->name('orders.index');
	Route::get('/orders/create','OrderController@create')->name('orders.create');
	Route::post('/orders/store','OrderController@store')->name('orders.store');
	Route::get('/orders/{order}/edit','OrderController@edit')->name('orders.edit');
	Route::put('/orders/{order}','OrderController@update')->name('orders.update');
	Route::delete('/orders/{order}','OrderController@destroy')->name('orders.destroy');
});