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

Route::group(['prefix' => 'posts'], function() {
    Route::get('index', 'App\Http\Controllers\Api\PostsController@index');
    Route::post('store', 'App\Http\Controllers\Api\PostsController@store');
    Route::put('{id}/update', 'App\Http\Controllers\Api\PostsController@update');
    Route::get('{id}', 'App\Http\Controllers\Api\PostsController@show');
    Route::delete('{id}/delete', 'App\Http\Controllers\Api\PostsController@delete');
});

Route::group(['prefix' => 'tags'], function() {
    Route::post('store', 'App\Http\Controllers\Api\TagsController@store');
});
