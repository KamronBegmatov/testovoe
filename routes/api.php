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

Route::post('perform_transaction', 'TransactionController@performTransaction');
Route::post('get_information', 'TransactionController@getInformation');

Route::post('get_information_user', 'UserController@getInformation');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
