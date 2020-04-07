<?php

use Illuminate\Support\Facades\Route;


Route::get('/','backend\IndexController@index');
Route::get('category','backend\CategoryController@allCategory');
Route::post('add-category','backend\CategoryController@store');
Route::get('edit-category/{id}','backend\CategoryController@edit');
Route::post('update-category/{id}','backend\CategoryController@update');
Route::get('delete-category/{id}','backend\CategoryController@delete');

//Route::get('/{anypath}','backend\IndexController@index')->where('path','.*');
