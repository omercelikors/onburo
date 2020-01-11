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

Route::post('save-candidate', 'PersonController@savePersonFromTSC')->name('save_candidate');

Route::middleware(['auth'])->group(function() {
    //student pages
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/student-other1-show', 'PersonController@student_other1_show')->name('student_other1_show');
    Route::get('/student-other2-show', 'PersonController@student_other2_show')->name('student_other2_show');
    Route::get('/student-other3-show', 'PersonController@student_other3_show')->name('student_other3_show');
    Route::get('/student-register-show', 'PersonController@student_register_show')->name('student_register_show');
    Route::get('/student-edit-show/{student_id}', 'PersonController@student_edit_show')->name('student_edit_show');
    Route::post('/student-register', 'PersonController@student_register')->name('student_register');
    Route::post('/student-edit-register', 'PersonController@student_edit_register')->name('student_edit_register');
    //payment pages
    Route::get('/payment-info-show', 'PaymentController@payment_info_show')->name('payment_info_show');
    Route::get('/payment-register-show/{button_register}', 'PaymentController@payment_register_show')->name('payment_register_show');
    Route::get('/payment-edit-show/{payment_id}', 'PaymentController@payment_edit_show')->name('payment_edit_show');
    Route::post('/payment-register', 'PaymentController@payment_register')->name('payment_register');
    Route::post('/payment-edit-register', 'PaymentController@payment_edit_register')->name('payment_edit_register');
    //candidate_student pages
    Route::get('/candidate-student-info-show', 'PersonController@candidate_student_info_show')->name('candidate_student_info_show');
    Route::get('/candidate-student-register-show', 'PersonController@candidate_student_register_show')->name('candidate_student_register_show');
    Route::get('/candidate-student-edit-show/{candidate_student_id}', 'PersonController@candidate_student_edit_show')->name('candidate_student_edit_show');
    Route::post('/candidate-student-register', 'PersonController@candidate_student_register')->name('candidate_student_register');
    Route::post('/candidate-student-edit-register', 'PersonController@candidate_student_edit_register')->name('candidate_student_edit_register');
    Route::post('/candidate-csvfileupload', 'PersonController@candidate_student_import_csv')->name('candidate_student_import_csv');
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
    Route::post('/polling-paper-download','PollingController@polling_paper_download')->name('polling_paper_download');
    //send sms
    Route::get('/sms-send-show', 'MessageController@sms_send_show')->name('sms_send_show');
    Route::post('/sms-send','MessageController@sms_send')->name('sms_send');

    //apis
    Route::get('/api/student-delete', 'PersonController@student_delete')->name('student_delete');
    Route::get('/api/teacher-delete', 'PersonController@teacher_delete')->name('teacher_delete');
    Route::get('/api/classroom-delete', 'ClassroomController@classroom_delete')->name('classroom_delete');
    Route::get('/api/classroom-update', 'ClassroomController@classroom_update')->name('classroom_update');
    Route::get('/api/candidate-student-delete', 'PersonController@candidate_student_delete')->name('candidate_student_delete');
    Route::get('/api/candidate-student-registered', 'PersonController@candidate_student_registered')->name('candidate_student_registered');
    Route::get('/api/candidate-student-not-come', 'PersonController@candidate_student_not_come')->name('candidate_student_not_come');
    Route::get('/api/company-employee-delete', 'PersonController@company_employee_delete')->name('company_employee_delete');
    Route::get('/api/payment-delete', 'PaymentController@payment_delete')->name('payment_delete');
    Route::get('/api/agency-delete', 'AgencyController@agency_delete')->name('agency_delete');
    Route::get('/api/branch-delete', 'UniversityBranchController@destroy');
    Route::get('/api/university-delete', 'UniversityController@destroy');
    Route::get('/api/recruitment-delete', 'RecruitmentController@destroy');
    //api in payment register page for getting agency name
    Route::get('/api/agency', 'PersonController@agency_name')->name('agency_name');

    Route::get('/all-analysis-show', 'Information_AnalysisController@all_analysis_show')->name('all_analysis_show');
    Route::get('/expected-payment-show', 'Information_AnalysisController@expected_payment_show')->name('expected_payment_show');
    Route::post('/expected-payment-calculate', 'Information_AnalysisController@expected_payment_calculate')->name('expected_payment_calculate');
    Route::get('/gain-payment-show', 'Information_AnalysisController@gain_payment_show')->name('gain_payment_show');
    Route::post('/gain-payment-calculate', 'Information_AnalysisController@gain_payment_calculate')->name('gain_payment_calculate');
    Route::get('/other-installment-show', 'Information_AnalysisController@other_installment_show')->name('other_installment_show');
    Route::get('/course-student-number-show', 'Information_AnalysisController@course_student_number_show')->name('course_student_number_show');
    Route::get('/age-country-show', 'Information_AnalysisController@age_country_show')->name('age_country_show');
    Route::get('/heard-by-show', 'Information_AnalysisController@heard_by_show')->name('heard_by_show');
    Route::get('/abandon-show', 'Information_AnalysisController@abandon_show')->name('abandon_show');
    Route::get('/population-time-show', 'Information_AnalysisController@population_time_show')->name('population_time_show');
    Route::get('/age-range-show', 'Information_AnalysisController@age_range_show')->name('age_range_show');

    //recruitment
    Route::resource('/recruitment', 'RecruitmentController');
    Route::get('/recruitment-ikinci', 'RecruitmentController@index1')->name('recruitment1');
    //univertsity
    Route::resource('/university', 'UniversityController');
    //university branch
    Route::resource('/university-branch', 'UniversityBranchController');
});





