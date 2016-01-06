<?php

// Authentication routes
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', 'PagesController@welcome');
    Route::get('/home', 'HomeController@index');
});

// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'web'], function () {
	// Category routes
	Route::get('/', 'AdminController@getDashboard');
    Route::get('categories/search', 'CategoriesController@searchCategories');
    Route::get('categories/create/{parent?}', 'CategoriesController@createCategory');
    Route::get('categories/{parent?}', 'CategoriesController@getCategories');
    Route::get('categories/{id}/edit', 'CategoriesController@editCategory');
    Route::post('categories/{parent?}', 'CategoriesController@saveCategory');
    Route::delete('categories/{id}', 'CategoriesController@deleteCategory');
    Route::patch('categories/{id}', 'CategoriesController@updateCategory');

    // Author routes
    Route::get('authors', 'AuthorsController@getAuthors');
    Route::get('authors/create', 'AuthorsController@createAuthor');
    Route::get('authors/search', 'AuthorsController@searchAuthors');
    Route::get('authors/{id}/edit', 'AuthorsController@editAuthor');
    Route::post('authors', 'AuthorsController@saveAuthor');
    Route::patch('authors/{id}', 'AuthorsController@updateAuthor');
    Route::delete('authors/{id}', 'AuthorsController@deleteAuthor');

    // Book routes
    Route::get('books', 'BooksController@getBooks');
    Route::get('books/create', 'BooksController@createBook');
    Route::get('books/search', 'BooksController@searchBooks');
    Route::get('books/{id}/edit', 'BooksController@editBook');
    Route::get('books/{id}/show', 'BooksController@showBook');
    Route::post('books', 'BooksController@saveBook');
    Route::patch('books/{id}', 'BooksController@updateBook');
    Route::delete('books/{id}', 'BooksController@deleteBook');

    // Edition routes
    Route::get('books/{book}/editions', 'EditionsController@getEditions');
    Route::get('books/{book}/editions/create', 'EditionsController@createEdition');
    Route::get('books/{book}/editions/{edition}/edit', 'EditionsController@editEdition');
    Route::get('books/{book}/editions/{edition}/show', 'EditionsController@showEdition');
    Route::post('books/{book}/editions', 'EditionsController@saveEdition');
    Route::patch('books/{book}/editions/{edition}', 'EditionsController@updateEdition');
    Route::delete('books/{book}/editions/{edition}', 'EditionsController@deleteEdition');
});