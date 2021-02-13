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

Route::/*middleware('admin')->*/get('/news/create', 'NewsController@create');

Route::get('/news/update/{id}', 'NewsController@update');

Route::get('/comments/create', 'CommentController@create');

Route::get('/news/get/{id}', 'NewsController@get');

Route::get('/comments/get/{id}', 'CommentController@get');
