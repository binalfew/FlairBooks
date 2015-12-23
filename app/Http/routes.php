<?php

Route::get('/', 'PagesController@welcome');

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});