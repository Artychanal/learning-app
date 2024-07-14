<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Roma is available';
});

Route::get('/my_page', 'MyPlaceController@index');
