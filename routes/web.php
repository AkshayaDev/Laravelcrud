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

Route::get('/', ['as'=>'insertuser','uses'=>'UserController@index']);
Route::post('/insert', ['as'=>'insertposteduser','uses'=>'UserController@insert']);
Route::get('/listusers', ['as'=>'listusers','uses'=>'UserController@listUsers']);
Route::get('/updateuser/{user}', ['as'=>'updateuser','uses'=>'UserController@update']);
Route::post('/doupdateuser', ['as'=>'postupdateuser','uses'=>'UserController@doupdate']);
Route::get('/deleteuser/{userid}', ['as'=>'deleteuser','uses'=>'UserController@deleteuser']);