<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'aaaaaaaaaaaaaaa';
});

Route::get('/posts', 'App\Http\Controllers\PostController@index');
