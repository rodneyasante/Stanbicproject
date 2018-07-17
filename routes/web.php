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

Route::get('/', function()
{
	return redirect()->route('projects.index');
});

Auth::routes();

Route::get('projects/preview', 'ProjectController@preview')->name('projects.preview');
Route::get('projects/{project}/publish', 'ProjectController@publish')->name('projects.publish');
Route::resource('projects', 'ProjectController');
