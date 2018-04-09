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
Route::pattern('id', '[0-9]+');
Route::get('/' , [
    'uses' => 'Index\IndexController@index',
    'as'   => 'index.index'
]);
Route::get('/task' , [
    'uses' => 'Index\IndexController@getTask',
    'as'   => 'index.task'
]);
Route::post('/task' , [
    'uses' => 'Index\IndexController@postTask',
    'as'   => 'index.task'
]);
Route::delete('/task/{id}' , [
    'uses' => 'Index\IndexController@delete',
    'as'   => 'index.delete'
]);



/**
 * Delete Task
 */


