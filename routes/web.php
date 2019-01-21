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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tasks/calendar', 'TasksController@calendar');
Route::get('/assess', 'AssessController@assess');
Route::get('/goals', 'GoalsController@all');
Route::get('/tasks/checklist', 'TasksController@checklist');
Route::get('/tasks/create', 'TasksController@new');
Route::get('/goals/new', 'GoalsController@new');
Route::get('/assess/submit', 'AssessController@new');
Route::get('/timer', 'TimerController@timer');
Route::POST('/create/task', 'TasksController@create');
Route::POST('/tasks/delete', 'TasksController@delete');
Route::POST('/tasks/edit', 'TasksController@update');
Route::POST('/tasks/complete', 'TasksController@complete');
Route::POST('/goals/complete', 'GoalsController@complete');
Route::POST('/goals/delete', 'GoalsController@delete');
Route::POST('/goals/create', 'GoalsController@create');
Route::POST('/goals/edit', 'GoalsController@update');

Route::get('/tasks/{task}', 'TasksController@show');