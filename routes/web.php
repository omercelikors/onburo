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
    return view('auth.login');
});

Auth::routes();


Route::group(['middleware' => ['role:recorder']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/student-register-show', 'PersonController@student_register_show')->name('student_register_show');
    Route::get('/student-edit-show/{student_id}', 'PersonController@student_edit_show')->name('student_edit_show');

    Route::post('/student-register', 'PersontController@student_register')->name('student_register');

    Route::get('/api/student-delete', 'PersonController@student_delete')->name('student_delete');
});


