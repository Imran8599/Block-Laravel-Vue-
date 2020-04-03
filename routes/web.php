<?php

use Illuminate\Support\Facades\Route;


Route::get('/','backend\IndexController@index');

Route::get('/{anypath}','backend\IndexController@index')->where('path','.*');
