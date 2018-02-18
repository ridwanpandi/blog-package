<?php

/*
|--------------------------------------------------------------------------
| Blog Routes
|--------------------------------------------------------------------------
|
*/

Route::get('get-all', "Ridwanpandi\Blog\Http\Controllers\BlogController@getAll");
Route::post('create/blog', "Ridwanpandi\Blog\Http\Controllers\BlogController@create");
Route::get('delete/blog/{id}', "Ridwanpandi\Blog\Http\Controllers\BlogController@delete");

Route::get('get-token', "Ridwanpandi\Blog\Http\Controllers\TokenController@getToken");
Route::post('get-payload', "Ridwanpandi\Blog\Http\Controllers\TokenController@getPayload");
