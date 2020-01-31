<?php

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'CrudController@index')->name('home-page');

Route::get('/employee/create', 'CrudController@create')->name('create.employee');
Route::post('/employee/store', 'CrudController@store')->name('store.employee');

Route::get('/employee/edit/{id}', 'CrudController@edit')->name('edit.employee');
Route::post('/employee/update/{id}', 'CrudController@update')->name('update.employee');

Route::get('/employee/destroy/{id}', 'CrudController@destroy')->name('destroy.employee');