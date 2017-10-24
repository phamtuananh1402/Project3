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
Route::get('/insertadmin','UserController@insertadmin');
Route::get('storage/{filename}', 'InstructorProgressController@get');

Route::get('/', function () {
    return view('homepage');
});

Route::get('/home', function () {

    return view('homepage');
});

Route::get('aboutus', function () {

    return view('aboutus');
});
Auth::routes();

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});
Route::get('/assignment/waiting', 'AssignmentController@show');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/topic/{topic_id}', 'TopicController@index');
    Route::get('/student/cv/{student_id}', 'StudentCvController@index');
    Route::get('/topic', 'ListTopicController@index');
    Route::get('/loadmore', 'ListTopicController@loadMore');

    ////
    Route::get('/search', 'SearchController@index');
    Route::post('/search/input', 'SearchController@checkInput');

});

//Routes only accessable by admin
Route::group(['middleware' => ['auth', 'admin']], function () {


    Route::get('/admin/dashboard', 'AdminController@indexDashboard');
    Route::get('/admin/post', 'LogsController@index');
    //Information about user
    Route::get('/admin/users', 'UserController@index');

    //grade
    Route::get('/admin/grade', 'UserController@grade');
    //Create User
    Route::get('/admin/users/create', 'UserController@create');
    Route::post('/admin/users/create', 'UserController@store');
    //
    Route::get('/notice', 'NoticeEmailController@create');
    Route::get('/failed/test', 'FailedController@destroy');

    Route::get('admin/destroy', 'UserController@destroy');

});

//Routes only accessable by company
Route::group(['middleware' => ['auth', 'company']], function () {


    //Representation and Company profile
    Route::post('/company/representation/{representation_id}', 'RepresentationCompanyController@store');
    Route::get('/company/representation/{representation_id}', 'RepresentationCompanyController@index');

    //Create Topic
    Route::get('company/topics/create', 'TopicController@create');
    Route::post('company/topics/create', 'TopicController@store');

    // approve/decline student
    Route::get('company/assign', 'CompanyAssignController@create');
    Route::get('company/assign/approve', 'CompanyAssignController@update');
    Route::get('company/assign/decline', 'CompanyAssignController@destroy');
    Route::get('company/choose', 'CompanyAssignController@show');
    Route::get('company/assign/{student_id}', 'CompanyAssignController@index');
    Route::get('company/recruit', 'AssignmentController@update');

    //register account for instructor
    Route::get('company/instructor/create', 'CompanyController@createInstructor');
    Route::post('company/instructor/create', 'CompanyController@storeInstructor');


});

//Routes only accessable by student
Route::group(['middleware' => ['auth', 'student']], function () {

    //Student Profile -done
    Route::get('student/profile/', 'StudentsController@index');
    Route::get('student/create/profile', 'StudentsController@create');
    Route::post('student/profile/update', 'StudentsController@store');
    Route::post('/dropzone', 'StudentsController@upload');
    //Student CV - done
    Route::get('student/cv', 'StudentCvController@create');
    Route::post('student/cv/update', 'StudentCvController@store');

    //Student Aspiration
    Route::get('student/create/aspiration', 'AspirationController@create');
    Route::post('student/aspiration/', 'AspirationController@store');

    //Student Report
    // Route::get('/student/intern', 'ReportController@create');
    Route::post('/student/intern', 'InternProcessController@store');
    Route::get('/student/mark', 'StudentMarkController@index');

    //Student Intern Process
    Route::get('/student/intern', 'InternProcessController@show');

    //student feedback
    Route::get('contact',
        ['as' => 'contact', 'uses' => 'FeedbackController@create']);
    Route::post('contact',
        ['as' => 'feedback', 'uses' => 'FeedbackController@store']);


});


Route::group(['middleware' => ['auth', 'manager']], function () {


    /* Matching */
    Route::get('/match', 'MatchingController@matchingFull');
    Route::get('/parser/approve', 'MatchingController@store');
    Route::get('/parser/decline', 'MatchingController@destroy');

    /* Assign Student */
    Route::get('/assign', 'AssignmentController@store');

    //Periods
    Route::get('/manager/periods', 'PeriodController@index');
    Route::get('/manager/periods/create', 'PeriodController@create');
    Route::post('/manager/periods/create', 'PeriodController@store');
    Route::get('manager/period/{period_id}', 'PeriodController@getPeriod');
    Route::get('manager/period/{period_id}/add/{student_id}', 'PeriodController@addStudentToPeriod');
    Route::get('manager/period/{period_id}/remove/{student_id}', 'PeriodController@removeStudentFromPeriod');

    //Profile
    Route::get('/manager/profile', 'InternManagementTeacherController@index');

    //topic approved/decline
    Route::get('manager/topics', 'TopicCensorController@create');
    Route::get('manager/topics/approve/', 'TopicCensorController@update');
    Route::get('manager/topics/decline/', 'TopicCensorController@destroy');
    //


});


//Routes only accessable by lecturer
Route::group(['middleware' => ['auth', 'lecturer']], function () {

    Route::get('/teacher/lecturer/{lecturer_id}', 'LecturerController@index');
    Route::post('/teacher/lecturer/{lecturer_id}', 'LecturerController@store');
    Route::get('/lecturer/intern', 'LecturerProgressController@index');

    //Lecturer Marking
    Route::get('lecturer/mark', 'MarkingController@index');
    //Route::get('lecturer/intern', 'MarkingController@create');
    Route::post('lecturer/intern', 'MarkingController@store');

    //Decide approve/decline topics

});

//Routes only accessable by instructor
Route::group(['middleware' => ['auth','instructor']], function () {
    Route::get('/instructor/outline/{topicId}','OutlineController@createOutline');
    Route::post('/instructor/outline/store','OutlineController@store');
    Route::post('/instructor/outline/work/done','OutlineController@workDone');
    Route::post('/instructor/outline/work/fail','OutlineController@workFail');
    Route::get('/outline/manage/{student_id}','OutlineController@outlineManage');
    Route::get('/company/instructor/{instructor_id}', 'InstructorController@index');//thieu view
    //Instructor profile
    Route::get('instructor/create/profile', 'InstructorController@create');//thieu view
    Route::post('instructor/profile', 'InstructorController@store');//thieu view
    //Instructor Timekeeping
    //Route::get('instructor/timekeeping', 'TimeKeepingController@index');
    Route::get('instructor/intern', 'InstructorProgressController@create');
    Route::post('instructor/internship', 'InstructorProgressController@store');
    

    //intern progress

    Route::get('instructor/intern', 'InstructorProgressController@index');
    Route::post('instructor/intern', 'MarkingController@storeInstructor');


});
