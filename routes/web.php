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
    return redirect()->route('home');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/lectures', 'LectureController@index')->name('addLecture');
Route::post('/lectures', 'LectureController@create')->name('addLecture');
Route::get('/lecture/{id}', 'LectureController@delete')->name('deleteLecture');


Route::get('/students', 'StudentController@index')->name('addStudent');
Route::post('/students', 'StudentController@create')->name('addStudent');
Route::get('/edit/{id}', 'StudentController@edit')->name('editStudent');
Route::post('/update/{id}', 'StudentController@update')->name('updateStudent');
Route::get('/student/{id}', 'StudentController@delete')->name('deleteStudent');
Route::get('/studentGrades/{id}', 'StudentController@showGrades')->name('studentGrades');

Route::get('/grades', 'GradeController@index')->name('setGrades');
Route::post('/grades', 'GradeController@setGrades')->name('setGrades');

Auth::routes();
