<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


/**
 * Unauthorized routes
 */
Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'LoginController@login')->name('login');
});

/**
 * Authorized routes
 */
Route::group(['middleware' => ['auth:api', 'api.request']], function () {
    Route::get('logout', 'LoginController@logout');
    Route::apiResource('customers', 'CustomerController');
    Route::apiResource('suppliers', 'SupplierController');
    Route::apiResource('products', 'ProductController');
    Route::apiResource('sales', 'SaleController');
});
