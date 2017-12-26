<?php

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('{slug?}.html', 'App\Modules\ContentManager\Controllers\PageController@show');
Route::get('{slug?}', 'App\Modules\ContentManager\Controllers\PostController@show');
Route::get('category/{slug?}', 'App\Modules\ContentManager\Controllers\CategoryController@show');
Route::get('tag/{slug?}', 'App\Modules\ContentManager\Controllers\tagController@show');