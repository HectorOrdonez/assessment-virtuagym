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

Route::get('/', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('plans', 'PlanController');

// Users assigned to plans
Route::resource('plans.users', 'PlanUserController', ['only' => ['store', 'destroy']]);

// Plan days
Route::resource('plans.days', 'PlanDayController', ['only' => ['store', 'update', 'destroy']]);

// Day Exercises
Route::resource('plans.days.exercises', 'PlanDayExerciseController', ['only' => ['store', 'update', 'destroy']]);
