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
Route::get('addTeacher','institute\teacherController@index')->name('addTeacher');
Route::post('addTeacher','institute\teacherController@addTeacher')->name('addTeacherPost');
Route::get('addCompany','institute\companyController@index')->name('addCompany');


Route::prefix('teacher')->group(function(){
    Route::get('/', 'teacherController@index')->name('teacher.dashboard');
    Route::get('/login', 'Auth\teacherLoginController@index')->name('teacher.login');
    Route::post('/login', 'Auth\teacherLoginController@login')->name('teacher.login.submit');
    Route::get('/logout','Auth\teacherLoginController@logout')->name('teacher.logout');
});

Route::prefix('student')->group(function(){
    Route::get('/', 'studentController@index')->name('student.dashboard');
    Route::get('/login', 'Auth\studentLoginController@index')->name('student.login');
    Route::post('/login', 'Auth\studentLoginController@login')->name('student.login.submit');
    Route::get('/logout','Auth\studentLoginController@logout')->name('student.logout');
});
