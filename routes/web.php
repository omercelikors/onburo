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
    //student pages
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/student-register-show', 'PersonController@student_register_show')->name('student_register_show');
    Route::get('/student-edit-show/{student_id}', 'PersonController@student_edit_show')->name('student_edit_show');
    Route::post('/student-register', 'PersonController@student_register')->name('student_register');
    Route::post('/student-edit-register', 'PersonController@student_edit_register')->name('student_edit_register');
    //payment pages
    Route::get('/payment-info-show', 'PaymentController@payment_info_show')->name('payment_info_show');
    Route::get('/payment-register-show', 'PaymentController@payment_register_show')->name('payment_register_show');
    Route::get('/payment-edit-show/{payment_id}', 'PaymentController@payment_edit_show')->name('payment_edit_show');
    Route::post('/payment-register', 'PaymentController@payment_register')->name('payment_register');
    Route::post('/payment-edit-register', 'PaymentController@payment_edit_register')->name('payment_edit_register');
    //candidate_student pages
    Route::get('/candidate-student-info-show', 'PersonController@candidate_student_info_show')->name('candidate_student_info_show');
    Route::get('/candidate-student-register-show', 'PersonController@candidate_student_register_show')->name('candidate_student_register_show');
    Route::get('/candidate-student-edit-show/{candidate_student_id}', 'PersonController@candidate_student_edit_show')->name('candidate_student_edit_show');
    Route::post('/candidate-student-register', 'PersonController@candidate_student_register')->name('candidate_student_register');
    Route::post('/candidate-student-edit-register', 'PersonController@candidate_student_edit_register')->name('candidate_student_edit_register');
    //company_employee
    Route::get('/company-employee-info-show', 'PersonController@company_employee_info_show')->name('company_employee_info_show');
    Route::get('/company-employee-register-show', 'PersonController@company_employee_register_show')->name('company_employee_register_show');
    Route::get('/company-employee-edit-show/{company_employee_id}', 'PersonController@company_employee_edit_show')->name('company_employee_edit_show');
    Route::post('/company-employee-register', 'PersonController@company_employee_register')->name('company_employee_register');
    Route::post('/company-employee-edit-register', 'PersonController@company_employee_edit_register')->name('company_employee_edit_register');
    //teachers
    Route::get('/teacher-info-show', 'PersonController@teacher_info_show')->name('teacher_info_show');
    Route::get('/teacher-register-show', 'PersonController@teacher_register_show')->name('teacher_register_show');
    Route::get('/teacher-edit-show/{teacher_id}', 'PersonController@teacher_edit_show')->name('teacher_edit_show');
    Route::post('/teacher-register', 'PersonController@teacher_register')->name('teacher_register');
    Route::post('/teacher-edit-register', 'PersonController@teacher_edit_register')->name('teacher_edit_register');
    //classrooms
    Route::get('/classroom-info-show', 'ClassroomController@classroom_info_show')->name('classroom_info_show');
    Route::get('/classroom-register-show', 'ClassroomController@classroom_register_show')->name('classroom_register_show');
    Route::get('/classroom-edit-show/{classroom_id}', 'ClassroomController@classroom_edit_show')->name('classroom_edit_show');
    Route::post('/classroom-register', 'ClassroomController@classroom_register')->name('classroom_register');
    Route::post('/classroom-edit-register', 'ClassroomController@classroom_edit_register')->name('classroom_edit_register');
    //agency
    Route::get('/agency-info-show', 'AgencyController@agency_info_show')->name('agency_info_show');
    Route::get('/agency-register-show', 'AgencyController@agency_register_show')->name('agency_register_show');
    Route::get('/agency-edit-show/{agency_id}', 'AgencyController@agency_edit_show')->name('agency_edit_show');
    Route::post('/agency-register', 'AgencyController@agency_register')->name('agency_register');
    Route::post('/agency-edit-register', 'AgencyController@agency_edit_register')->name('agency_edit_register');
    //polling paper
    Route::get('/polling-paper-show', 'PollingController@polling_paper_show')->name('polling_paper_show');
    //phpword library
    Route::get('create','PollingController@create')->name('polling_paper_create');
    Route::post('store','PollingController@store')->name('polling_paper_store');
    //all apis
    Route::get('/api/student-delete', 'PersonController@student_delete')->name('student_delete');
    Route::get('/api/teacher-delete', 'PersonController@teacher_delete')->name('teacher_delete');
    Route::get('/api/classroom-delete', 'ClassroomController@classroom_delete')->name('classroom_delete');
    Route::get('/api/candidate-student-delete', 'PersonController@candidate_student_delete')->name('candidate_student_delete');
    Route::get('/api/company-employee-delete', 'PersonController@company_employee_delete')->name('company_employee_delete');
    Route::get('/api/payment-delete', 'PaymentController@payment_delete')->name('payment_delete');
    Route::get('/api/agency-delete', 'AgencyController@agency_delete')->name('agency_delete');
});


