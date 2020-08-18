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


Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::get('email/verify/{id}', 'API\VerificationController@verify')->name('verification.verify');

Route::get('email/resend', 'API\VerificationController@resend')->name('verification.resend');


Route::group(['prefix' => 'user/{id}', 'namespace' => 'API', 'middleware' => 'auth:api'], function () {
    Route::post('detail', 'UserController@detail');
});
