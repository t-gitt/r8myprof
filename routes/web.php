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

Route::group(['middleware' => 'auth'], function () {
Route::get('/', function () {
    return view('welcome');
});
Route::resource('ratings', 'RatingsController');
Route::get('/rating/create/{id}', 'RatingsController@create');
Route::resource('courses', 'CoursesController');
Route::resource('university', 'UniversitiesController');



});

Route::resource('professors', 'ProfessorsController');
Route::get('/home', 'PagesController@home');
Route::get('/', 'PagesController@home');
Route::post('/search', 'ProfessorsController@search');

Auth::routes();
