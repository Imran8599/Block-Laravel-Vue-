<?php

use Illuminate\Support\Facades\Route;


Route::get('/','backend\IndexController@index');
Route::post('add-category','backend\CategoryController@store');
Route::get('/category','backend\CategoryController@allCategory');

//Route::get('/{anypath}','backend\IndexController@index')->where('path','.*');
