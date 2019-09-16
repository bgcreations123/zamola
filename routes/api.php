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
    return Auth::user();
});

// Route::get('/user', function(Request $request) {
//     return Auth::user();
// })->middleware('auth:api');

Route::post('/register', 'Api\AuthController@register');

Route::post('/login', 'Api\AuthController@login');

Route::apiResource('/duty', 'Api\DutyController');
Route::get('/move_status/{duty}', 'Api\DutyController@move_status')->name('move_status');
Route::apiResource('/order', 'Api\OrderController');
Route::apiResource('/shipment_categories', 'Api\ShipmentCategoryController');
Route::apiResource('/payment_methods', 'Api\PaymentMethodController');

Route::resource('create_order', 'OrderController');
Route::resource('category', 'ShipmentCategoryController');
Route::resource('payment_method', 'PaymentMethodController');
Route::post('step_1', 'OrderController@step_1');
Route::post('step_2', 'OrderController@step_2');
