<?php

Route::get('/', ['as' => "front", 'uses' => 'App\Http\Controllers\HomeController@index']);
Route::get('team', ['as' => "{$this->locale}.doctors.team", 'uses' => 'App\Modules\ContentManager\Controllers\DoctorController@team']);
Route::get('news', ['as' => "{$this->locale}.category.news", 'uses' => 'App\Modules\ContentManager\Controllers\CategoryController@news']);
Route::get('{slug?}.html', ['as' => "{$this->locale}.page.show", 'uses' => 'App\Modules\ContentManager\Controllers\PageController@show']);
Route::get('{slug?}', ['as' => "{$this->locale}.post.show", 'uses' => 'App\Modules\ContentManager\Controllers\PostController@show']);
Route::get('category/{slug?}', ['as' => "{$this->locale}.category.show", 'uses' => 'App\Modules\ContentManager\Controllers\CategoryController@show']);
Route::get('doctor/{slug?}', ['as' => "{$this->locale}.doctor.show", 'uses' => 'App\Modules\ContentManager\Controllers\DoctorController@show']);
Route::get('tag/{slug?}', ['as' => "{$this->locale}.tag.show", 'uses' => 'App\Modules\ContentManager\Controllers\TagController@show']);