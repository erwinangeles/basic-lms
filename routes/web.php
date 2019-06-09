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

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/view', function () {
    return view('courses.index');
});
Route::get('course/{course}', 'CourseController@course');
Route::get('course/{course}/{module}', 'CourseController@module');
Route::get('/{course}/summary', 'CourseController@summary');
Route::resource('courses', 'CourseController');
Route::resource('modules', 'ModuleController');
Route::get('/dashboard', 'CourseController@index')->name('index');



