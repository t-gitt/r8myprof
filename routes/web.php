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

Route::group(['middleware' => 'auth', 'middleware' => 'verified'], function () {
Route::get('/', function () {
    return view('welcome');
});
Route::resource('ratings', 'RatingsController');
Route::get('/rating/create/{id}', 'RatingsController@create');
Route::resource('courses', 'CoursesController');
Route::resource('university', 'UniversitiesController');



});

Route::get('/professors/create', 'ProfessorsController@create')->middleware('auth');
Route::resource('professors', 'ProfessorsController');
Route::get('/home', 'PagesController@home');
Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/privacy', 'PagesController@privacy');
Route::get('/faq', 'PagesController@faq');
Route::get('/contact', 'PagesController@contact');
Route::post('/search', 'ProfessorsController@search');
Route::get('/filter', 'ProfessorsController@filter');
Auth::routes(['verify' => true]);
