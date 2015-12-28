<?php

// Pages routes 
Route::get('/', 'PagesController@welcome');

// Authentication routes
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
});

// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'web'], function () {
	Route::get('/', 'AdminController@getDashboard');
	Route::get('categories/create/{parent?}', 'CategoriesController@createCategory');
	Route::get('categories/{parent?}', 'CategoriesController@getCategories');
	Route::get('categories/{id}/edit', 'CategoriesController@editCategory');
    Route::post('categories/{parent?}', 'CategoriesController@saveCategory');
    Route::delete('categories/{id}', 'CategoriesController@deleteCategory');
    Route::patch('categories/{id}', 'CategoriesController@updateCategory');
});