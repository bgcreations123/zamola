<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('order', 'OrderController');

Route::resource('category', 'ShipmentCategoryController');

Route::resource('payment_method', 'PaymentMethodController');

Route::post('step_1', 'OrderController@step_1');
Route::post('step_2', 'OrderController@step_2');
