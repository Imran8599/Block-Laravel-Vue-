<?php

use Illuminate\Support\Facades\Route;


Route::get('/','frontend\IndexController@index');






Route::get('/admin','backend\IndexController@index');
//Category
Route::get('category','backend\CategoryController@allCategory');
Route::post('add-category','backend\CategoryController@store');
Route::get('edit-category/{id}','backend\CategoryController@edit');
Route::post('update-category/{id}','backend\CategoryController@update');
Route::get('delete-category/{id}','backend\CategoryController@delete');
//Post
Route::get('post','backend\PostController@index');
Route::post('add-post','backend\PostController@store');
Route::get('edit-post/{id}','backend\PostController@edit');
Route::post('update-post/{id}','backend\PostController@update');
Route::get('delete-post/{id}','backend\PostController@delete');
Route::get('single-post/{id}','backend\PostController@details');
Route::get('latest-post','backend\PostController@latestPost');
Route::get('category-posts/{id}','backend\PostController@categoryPost');











//Route::get('/{anypath}','backend\IndexController@index')->where('path','.*');
