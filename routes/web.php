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
})->name('welcome');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

// Private pages
Route::group(['middleware' => 'auth'], function(){
	// All roles consumed pages
	Route::get('profile/{id}', 'HomeController@view_profile')->name('user.view_profile');
	Route::post('profile/{id}', 'HomeController@store_profile')->name('user.store_profile');
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
		Route::get('follow-ups', 'BookController@followups')->name('bookings.followups');
		Route::get('{order_id}/show', 'BookController@show')->name('bookings.show');
		Route::post('book', 'BookController@store')->name('bookings.store');
		Route::get('{shipment_id}/raise_invoice', 'BookController@raise_invoice')->name('bookings.raise_invoice');
	});

	// Private Driver pages
	Route::group(['middleware' => 'access_driver', 'prefix' => 'driver'], function(){
		Route::get('/', 'DriverController@index')->name('driver');
		Route::get('duties', 'DutyController@index')->name('duties');
		Route::get('{shipment_id}/duty', 'DutyController@show')->name('duties.show');
		Route::get('{shipment_id}/move_status', 'DutyController@move_status')->name('duties.move_status');
		Route::post('{shipment_id}/cancel_approval', 'DutyController@cancel_approval')->name('duties.cancel_approval');
		Route::get('{driver_id}/deliveries', 'DutyController@deliveries')->name('deliveries');
	});

});

