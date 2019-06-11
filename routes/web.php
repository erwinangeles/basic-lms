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


Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('course/{course}', 'CourseController@course');
Route::get('course/{course}/{module}', 'CourseController@module');
Route::get('/{course}/summary', 'CourseController@summary');
Route::get('/dashboard', 'CourseController@homepage')->name('homepage');

Route::prefix('admin')->name('admin.')->group(function (){
    Route::resource('courses', 'CourseController');
});
Route::prefix('admin')->name('admin.')->group(function (){
    Route::resource('modules', 'ModuleController');
});



