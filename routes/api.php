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

// Register API user
Route::post('register', 'API\UserController@register');

// Login API user
Route::post('login', 'API\UserController@login');

// Get all transactions
Route::get('transactions', 'API\TransactionController@transactions');

// Get one transaction
Route::get('transaction/{line}', 'API\TransactionController@transaction')->where('line', '[0-9]+');