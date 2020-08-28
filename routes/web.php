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
    return view('users.login.login');
});

Auth::routes();

Route::group(['middleware' => 'task'], function () {
    //
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/add-task',[
        'uses' => 'TaskController@addTask',
        'as' => 'add-task'
    ]);

    Route::post('/new-task',[
        'uses' => 'TaskController@saveTask',
        'as' => 'new-task'
    ]);

    Route::get('/manage-task',[
        'uses' => 'TaskController@manageTask',
        'as' => 'manage-task'
    ]);

    Route::get('/edit-task/{id}',[
        'uses' => 'TaskController@editTask',
        'as' => 'edit-task'
    ]);

    Route::post('/update-task',[
        'uses' => 'TaskController@updateTask',
        'as' => 'update-task'
    ]);

    Route::get('/task-incomplete/{id}',[
        'uses' => 'TaskController@taskIncomplete',
        'as' => 'task-incomplete'
    ]);

    Route::get('/task-complete/{id}',[
        'uses' => 'TaskController@taskComplete',
        'as' => 'task-complete'
    ]);

    Route::get('/delete-task/{id}',[
        'uses' => 'TaskController@deleteTask',
        'as' => 'delete-task'
    ]);
});


