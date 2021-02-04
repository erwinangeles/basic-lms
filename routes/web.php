<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'CourseController@homepage')->name('homepage');

Route::get('course/{course}', 'CourseController@course')->name('course');
Route::get('course/{course}/{module}', 'CourseController@module')->name('module');
Route::get('/{course}/summary', 'CourseController@summary')->name('summary');
Route::get('/admin', 'CourseController@admin')->name('admin');


Route::prefix('admin')->name('admin.')->group(function (){
    Route::resource('courses', 'CourseController');
    Route::resource('modules', 'ModuleController');

});

