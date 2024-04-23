<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/users/unregistered', 'App\Http\Controllers\UserController@showUnregisteredForm')->name('users.unregistered');

// dashboard
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard.index');

// gestión de usuarios
Route::get('/users', 'App\Http\Controllers\UserController@index')->name('users.index');
Route::get('/users/create', 'App\Http\Controllers\UserController@create')->name('users.create');
Route::post('/users', 'App\Http\Controllers\UserController@store')->name('users.store');
Route::get('/users/{user}/edit', 'App\Http\Controllers\UserController@edit')->name('users.edit');
Route::put('/users/{user}', 'App\Http\Controllers\UserController@update')->name('users.update');
Route::delete('/users/{user}', 'App\Http\Controllers\UserController@destroy')->name('users.destroy');

// gestión de pedidos
Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('orders.index');
Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name('orders.create');
Route::post('/orders', 'App\Http\Controllers\OrderController@store')->name('orders.store');
Route::get('/orders/{order}', 'App\Http\Controllers\OrderController@show')->name('orders.show');
Route::get('/orders/{order}/edit', 'App\Http\Controllers\OrderController@edit')->name('orders.edit');
Route::put('/orders/{order}', 'App\Http\Controllers\OrderController@update')->name('orders.update');
Route::delete('/orders/{order}', 'App\Http\Controllers\OrderController@destroy')->name('orders.destroy');

// órdenes archivadas
Route::patch('/orders/{order}/archive', 'App\Http\Controllers\OrderController@archive')->name('orders.archive');
Route::patch('/orders/{order}/unarchive', 'App\Http\Controllers\OrderController@unarchive')->name('orders.unarchive');
Route::get('/archived-orders', 'App\Http\Controllers\OrderController@archived')->name('archived.index');

