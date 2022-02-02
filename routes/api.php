<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', '\App\Http\Controllers\PassportAuthController@register');
Route::post('login', '\App\Http\Controllers\PassportAuthController@login');

Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
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

Route::group(['middleware' => 'auth:api', 'prefix' => 'public'], function () {
    Route::post('orders', '\App\Http\Controllers\OrderController@store');

    Route::get('products', '\App\Http\Controllers\ProductController@index');
    Route::get('products/{products}', '\App\Http\Controllers\ProductController@show');
});
