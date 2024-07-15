<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'aaaaaaaaaaaaaaa';
});

Route::get('/my_page', 'App\Http\Controllers\MyPlaceController@index');
