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
Route::group(['prefix' => 'inventory'], function () {
    Route::resource('products', 'ProductController');
});
Route::group(['prefix' => 'cart'], function () {
    Route::post('buy', 'PurchaseController@buy');
    Route::delete('cancel/{invoice}', 'PurchaseController@cancelPurchase');
});
Route::group(['prefix' => 'reports'], function () {
    Route::get('sells', 'ReportController@sells');
});
