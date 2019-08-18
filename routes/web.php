<?php

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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->middleware(['access_user'])->name('home');

// Private pages
Route::group(['middleware' => 'auth'], function(){

	Route::get('profile/{id}', 'HomeController@profile')->name('user.profile');
	
	Route::get('trace/{tracer}', 'TraceController@trace')->name('trace');

	// Private User pages
	Route::group(['middleware' => 'access_user'], function(){
		Route::get('/home', 'HomeController@index')->name('home');

		Route::get('order', 'OrderController@index')->name('order');
		Route::get('order/{id}/listing/{status?}', 'OrderController@list')->name('order.list');
	});

	// Private Staff pages
	Route::group(['middleware' => 'access_staff', 'prefix' => 'staff'], function(){
		Route::get('/', 'StaffController@index')->name('staff');
		Route::get('orders', 'BookController@index')->name('bookings');
		Route::get('bookings', 'BookController@assignments')->name('bookings.assignments');
		Route::get('{order_id}/show', 'BookController@show')->name('bookings.show');
		Route::post('book', 'BookController@store')->name('bookings.store');
		Route::get('{shipment_id}/raise_invoice', 'BookController@raise_invoice')->name('bookings.raise_invoice');
	});

	// Private Driver pages
	Route::group(['middleware' => 'access_driver', 'prefix' => 'driver'], function(){
		Route::get('/', 'DriverController@index')->name('driver');
		Route::get('duties', 'DutyController@index')->name('duties');
		Route::get('{shipment_id}/duty', 'DutyController@show')->name('duties.show');
		Route::get('{order_id}/{shipment_id}/transit', 'DutyController@transit')->name('duties.transit');
		Route::get('{order_id}/{shipment_id}/delivered', 'DutyController@delivered')->name('duties.delivered');
		Route::get('{driver_id}/deliveries', 'DutyController@deliveries')->name('deliveries');
	});

});

