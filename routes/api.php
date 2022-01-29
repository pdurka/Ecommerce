<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
Route::prefix('admin')->group(function () {
    Route::get('orders', '\App\Http\Controllers\Admin\OrderController@index');
    Route::get('orders/{orders}', '\App\Http\Controllers\Admin\OrderController@show');
    Route::post('orders', '\App\Http\Controllers\Admin\OrderController@store');
    Route::put('orders/{orders}', '\App\Http\Controllers\Admin\OrderController@update');

    Route::get('products', '\App\Http\Controllers\Admin\ProductController@index');
    Route::get('products/{products}', '\App\Http\Controllers\Admin\ProductController@show');
    Route::post('products', '\App\Http\Controllers\Admin\ProductController@store');
    Route::put('products/{products}', '\App\Http\Controllers\Admin\ProductController@update');

    Route::get('users', '\App\Http\Controllers\Admin\UserController@index');
    Route::get('users/{users}', '\App\Http\Controllers\Admin\UserController@show');
    Route::post('users', '\App\Http\Controllers\Admin\UserController@store');
    Route::put('users/{users}', '\App\Http\Controllers\Admin\UserController@update');
});

Route::prefix('public')->group(function () {
    Route::post('articles', '\App\Http\Controllers\OrderController@store');

    Route::get('products', '\App\Http\Controllers\ProductController@index');
    Route::get('products/{products}', '\App\Http\Controllers\ProductController@show');
});
