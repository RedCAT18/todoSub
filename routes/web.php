<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=>'auth'],function(){
    Route::resource('project', 'ProjectController'); //꼭 필요할 때만 사용. 그 외엔 route로 생성.

    Route::get('task', 'TaskController@index')->name('task.index');
    Route::get('project/{project_id}/task', 'TaskController@listUp')->name('project.task'); //하위카테고리로 관리.
    Route::get('task/create', 'TaskController@create')->name('task.create');
    Route::post('task', 'TaskController@store');
    Route::get('task/{id}', 'TaskController@show');
    //Route::resource('task', 'TaskController');

    Route::get('/home', 'HomeController@index');
});
//Route::get('/project', 'ProjectController@index');
