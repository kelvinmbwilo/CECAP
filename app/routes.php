<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('login');
});

Route::get('home', function()
{
    return View::make('home');
});


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Managing user actions
 * Directing routes to correct controllers
 */
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//validating user during login
Route::post('login',array('as'=>'login', 'uses'=>'UserController@validate'));

//logging a user out
Route::get('logout',array('as'=>'logout', 'uses'=>'UserController@logout'));

//display a form to add new user
Route::get('user/add',array('as'=>'adduser', 'uses'=>'UserController@create'));

//display a list of users
Route::get('user/list',array('uses'=>'UserController@userlist'));

//adding new user
Route::post('user/add',array('as'=>'adduser1', 'uses'=>'UserController@store'));

//viewing list of users
Route::get('users',array('as'=>'listuser', 'uses'=>'UserController@index'));

//display a form to edit users information
Route::get('user/edit/{id}',array('as'=>'edituser', 'uses'=>'UserController@edit'));

//editng users information
Route::post('user/edit/{id}',array('as'=>'edituser', 'uses'=>'UserController@update'));

//deleting user
Route::post('user/delete/{id}',array('as'=>'deleteuser', 'uses'=>'UserController@destroy'));

//display a system usage log for a user
Route::get('user/log/{id}',array('as'=>'userlog', 'uses'=>'UserController@show'));

/**
 * patient registration routes
 * working with patientController
 * @todo adding all related fields of patients categoriwise
 */

//display a patient list
Route::get('patients',array('uses'=>'PatientController@index'));

//display a system usage log for a user
Route::get('patient/register',array('uses'=>'PatientController@create'));

//check for a regions district...
Route::post('patient/region_check/{id}',array('uses'=>'PatientController@check_region'));

//making a patient follow up...
Route::get('patient/follow_up/{id}',array('uses'=>'PatientController@followup'));

//patient registration
Route::post('patient/add',array('uses'=>'PatientController@store'));