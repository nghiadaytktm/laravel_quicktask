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
Route::pattern('locale', '[a-z0-9]+');
Route::resource('task','Index\ResourceController');
Route::get('locale','Index\LanguageController@index');
Route::get('locale/{locale}','Index\LanguageController@switchLanguage');
