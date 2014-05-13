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
 *
 */

//display a patient list
Route::get('patients',array('uses'=>'PatientController@index'));

//display a form to register new user
Route::get('patient/register',array('uses'=>'PatientController@create'));

//display a A single patient information
Route::get('patients/{id}',array('uses'=>'PatientController@show'));

//check for a regions district...
Route::post('patient/region_check/{id}',array('uses'=>'PatientController@check_region'));

//check for a regions district...
Route::post('patient/region_check1/{id}',array('uses'=>'PatientController@check_region1'));

//making a patient follow up...
Route::get('patient/follow_up/{id}',array('uses'=>'PatientController@followup'));

//making a patient follow up...
Route::post('patient/follow_up/{id}',array('uses'=>'PatientController@store_followup'));

//patient registration
Route::post('patient/add',array('uses'=>'PatientController@store'));

//patient registration
Route::post('patient/delete/{id}',array('uses'=>'PatientController@destroy'));

/**
* patient registration routes
* working with patientController
* @todo adding all related fields of patients reports
*/


//displaying index page
Route::get('reports',array('uses'=>'ReportController@index'));

//displaying index page
Route::post('reports/process',array('uses'=>'ReportController@process'));


//display index page of contraceptive history
Route::get('reports/contraceptive/barchat',array('uses'=>'ReportController@displayBarChart'));

/**
 * Contraceptive Reports
 * Using ContraceptiveController
 */
//display index page of contraceptive history
Route::get('reports/contraceptive',array('uses'=>'ContraceptiveController@index'));

//displaying table chart
Route::post('report/contraceptive/table',array('uses'=>'ContraceptiveController@makeTable'));

//displaying bar chart
Route::post('report/contraceptive/bar',array('uses'=>'ContraceptiveController@makeBar'));

//displaying line chart
Route::post('report/contraceptive/line',array('uses'=>'ContraceptiveController@makeLine'));

/**
 * HIV Status Reports
 * Using HivController
 */
//display index page of contraceptive history
Route::get('reports/hiv_status',array('uses'=>'HivController@index'));

//displaying table chart
Route::post('report/hiv/table',array('uses'=>'HivController@makeTable'));

//displaying bar chart
Route::post('report/hiv/bar',array('uses'=>'HivController@makeBar'));

//displaying line chart
Route::post('report/hiv/line',array('uses'=>'HivController@makeLine'));

/**
 * Colposcopy Status Reports
 * Using ColposcopyController
 */
//display index page of contraceptive history
Route::get('reports/colposcopy',array('uses'=>'ColposcopyController@index'));

//displaying table chart
Route::post('report/colposcopy/table',array('uses'=>'ColposcopyController@makeTable'));

//displaying bar chart
Route::post('report/colposcopy/bar',array('uses'=>'ColposcopyController@makeBar'));

//displaying line chart
Route::post('report/colposcopy/line',array('uses'=>'ColposcopyController@makeLine'));

/**
 * pap_smear Status Reports
 * Using PapSmearController
 */
//display index page of contraceptive history
Route::get('reports/pap_smear',array('uses'=>'PapSmearController@index'));

//displaying table chart
Route::post('report/pap_smear/table',array('uses'=>'PapSmearController@makeTable'));

//displaying bar chart
Route::post('report/pap_smear/bar',array('uses'=>'PapSmearController@makeBar'));

//displaying line chart
Route::post('report/pap_smear/line',array('uses'=>'PapSmearController@makeLine'));

/**
 * VIA Status Reports
 * Using VIAController
 */
//display index page of contraceptive history
Route::get('reports/via',array('uses'=>'VIAController@index'));

//displaying table chart
Route::post('report/via/table',array('uses'=>'VIAController@makeTable'));

//displaying bar chart
Route::post('report/via/bar',array('uses'=>'VIAController@makeBar'));

//displaying line chart
Route::post('report/via/line',array('uses'=>'VIAController@makeLine'));

/**
 * VIA Status Reports
 * Using VIAController
 */
//displaying table chart
Route::post('report/general/table',array('uses'=>'GeneralController@makeTable'));

//displaying bar chart
Route::post('report/general/bar',array('uses'=>'GeneralController@makeBar'));

//displaying line chart
Route::post('report/general/line',array('uses'=>'GeneralController@makeLine'));

//displaying line chart
//Route::post('report/general/pie',array('uses'=>'GeneralController@makePie'));

/**
 * Dashboard settings
 * Using Dashboard Controller
 */
//displaying table chart
Route::get('dashboard/settings',array('uses'=>'DashboardController@index'));

//Changing The Title
Route::post('dashboard/title',array('uses'=>'DashboardController@setTitle'));

//Changing TheWelcome Note
Route::post('dashboard/welcome_note',array('uses'=>'DashboardController@setWelcome'));

//Changing The Chart
Route::post('dashboard/chat',array('uses'=>'DashboardController@setChat'));
