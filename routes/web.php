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
    Route::post('/student-register', 'PersonController@student_register')->name('student_register');
    Route::post('/student-edit-register', 'PersonController@student_edit_register')->name('student_edit_register');

    Route::get('/payment-info-show', 'PaymentController@payment_info_show')->name('payment_info_show');
    Route::get('/payment-register-show', 'PaymentController@payment_register_show')->name('payment_register_show');
    Route::get('/payment-edit-show/{payment_id}', 'PaymentController@payment_edit_show')->name('payment_edit_show');
    Route::post('/payment-register', 'PaymentController@payment_register')->name('payment_register');
    Route::post('/payment-edit-register', 'PaymentController@payment_edit_register')->name('payment_edit_register');
    
    Route::get('/candidate-student-info-show', 'PersonController@candidate_student_info_show')->name('candidate_student_info_show');
    Route::get('/candidate-student-register-show', 'PersonController@candidate_student_register_show')->name('candidate_student_register_show');
    Route::get('/candidate-student-edit-show/{candidate_student_id}', 'PersonController@candidate_student_edit_show')->name('candidate_student_edit_show');
    Route::post('/candidate-student-register', 'PersonController@candidate_student_register')->name('candidate_student_register');
    Route::post('/candidate-student-edit-register', 'PersonController@candidate_student_edit_register')->name('candidate_student_edit_register');

    Route::get('/api/student-delete', 'PersonController@student_delete')->name('student_delete');
    Route::get('/api/candidate-student-delete', 'PersonController@candidate_student_delete')->name('candidate_student_delete');
    Route::get('/api/payment-delete', 'PaymentController@payment_delete')->name('payment_delete');
});


