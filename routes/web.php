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
    return view('welcome');
});

// Route::get('/', function () {
//     return redirect('login');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/institute/logout','Auth\LoginController@insLogout')->name('institute.logout');
Route::get('addStudent','institute\studentController@index')->name('addStudent');
Route::post('addStudent','institute\studentController@addStudent')->name('addStudent');
Route::get('addTeacher','institute\teacherController@index')->name('addTeacher');
Route::post('addTeacher','institute\teacherController@addTeacher')->name('addTeacherPost');
Route::get('addCompany','institute\companyController@index')->name('addCompany');
Route::get('notification','institute\notificationController@index')->name('notification');
Route::get('profile','institute\profileController@index')->name('profile');
Route::post('profile','institute\profileController@update_avatar')->name('profilePost');
Route::post('addNotification','institute\notificationController@addNotification')->name('addNotification');
Route::post('addCompany','institute\companyController@addCompany')->name('addCompany');

Route::prefix('teacher')->group(function(){
    Route::get('/', 'teacherController@index')->name('teacher.dashboard');
    Route::get('/login', 'Auth\teacherLoginController@index')->name('teacher.login');
    Route::post('/login', 'Auth\teacherLoginController@login')->name('teacher.login.submit');
    Route::get('/logout','Auth\teacherLoginController@logout')->name('teacher.logout');
    Route::get('teacherprofile','teacher\teacherprofileController@index')->name('teacherprofile');
    Route::post('teacherprofile','teacher\teacherprofileController@update_avatar')->name('teacherprofile');
    Route::get('sendNotification','teacher\sendnotificationController@sendNotification')->name('sendNotification')
    ;
});

Route::prefix('student')->group(function(){
    Route::get('/', 'studentController@index')->name('student.dashboard');
    Route::get('/login', 'Auth\studentLoginController@index')->name('student.login');
    Route::post('/login', 'Auth\studentLoginController@login')->name('student.login.submit');
    Route::get('/logout','Auth\studentLoginController@logout')->name('student.logout');
    Route::get('addProfile','student\addprofileController@addprofile')->name('addProfile');
    Route::get('studentprofile','student\studentprofileController@index')->name('studentprofile');
    Route::post('studentprofile','student\studentprofileController@update_avatar')->name('studentprofile');
});
