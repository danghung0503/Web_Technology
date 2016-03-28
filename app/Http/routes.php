<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('admin', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::group(['prefix'=>'auth'],function(){
	Route::get('login',['as'=>'auth.getLogin','uses'=>'Auth\AuthController@getLogin']);
	Route::post('login',['as'=>'auth.postLogin','uses'=>'Auth\AuthController@postLogin']);
	Route::get('register',['as'=>'auth.getRegister','uses'=>'Auth\AuthController@getRegister']);
	Route::post('register',['as'=>'auth.postRegister','uses'=>'Auth\AuthController@postRegister']);
	Route::get('verify/{code}',['as'=>'auth.getVerify','use'=>'Auth\AuthController@getVerify']);
});
Route::group(['prefix'=>'member'],function(){
	Route::get('index',['as'=>'member.index','uses'=>'UserController@index']);
});