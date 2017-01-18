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

Route::get('/', array('uses' =>'HomeController@index', 'as' => 'index'));

Route::group(array('before' => 'guest'), function()
{
	Route::get('/login',array('uses' =>'UserController@getLogin', 'as' => 'getLogin'));
	Route::get('/register',array('uses' =>'UserController@getRegister', 'as' => 'getRegister'));
	Route::get('/getPassRes',array('uses' =>'UserController@getPassRes', 'as' => 'getPassRes'));
	Route::group(array('before' => 'csrf'), function()
	{
		Route::post('/user/login',array('uses' => 'UserController@postLogin', 'as' => 'postLogin'));
		Route::post('/user/create', array('uses' => 'UserController@postCreate', 'as' => 'postCreate'));
		Route::post('/user/passreset', array('uses' => 'UserController@postPassReset', 'as' => 'postPassReset'));
	});
});

Route::group(array('before' => 'auth'), function()
{
	Route::get('/user/logout', array('uses' => 'UserController@getLogout', 'as' => 'getLogout'));
});

Route::group(array('prefix' => '/uam'),function()
{
	Route::group(array('before' => 'auth'), function()
	{
		Route::get('/getUAL', array('uses' => 'UserController@getUAL', 'as' => 'getUAL','middleware' => 'auth'));
	});
});

Route::group(array('prefix' => '/ajax'),function()
{
	Route::group(array('before' => 'auth'), function()
	{
		Route::group(array('before' => 'csrf'), function()
		{
			Route::get('/admin/list',array('uses' => 'UserController@adminUserList', 'as' => 'adminUserList'));
			Route::get('/admin/uaal', array('uses' => 'UserController@uaal', 'as' => 'uaal','middleware' => 'auth'));
			Route::get('/admin/userlist', array('uses' => 'GlobalController@userlist', 'as' => 'userlist','
					middleware' => 'auth'));
			Route::post('/addAdmin', array('uses' => 'UserController@addAdmin', 'as' => 'addAdmin','middleware' => 'auth'));
			Route::post('/updateAdmin', array('uses' => 'UserController@updateAdmin', 'as' => 'updateAdmin','middleware' => 'auth'));

			Route::get('/brgy/list', array('uses' => 'FileMaintenanceController@brgyList', 'as' => 'brgyList','middleware' => 'auth'));
			Route::get('/secret/list', array('uses' => 'FileMaintenanceController@secretList', 'as' => 'secretList','middleware' => 'auth'));
			Route::get('/household/list', array('uses' => 'RecordController@householdList', 'as' => 'householdList','middleware' => 'auth'));
			Route::get('/brgy/brgyInfo/{cid}', array('uses' => 'GlobalController@brgyInfo', 'as' => 'brgyInfo','middleware' => 'auth'));
			Route::get('/secret/secretInfo/{cid}', array('uses' => 'GlobalController@secretInfo', 'as' => 'secretInfo','middleware' => 'auth'));
			Route::post('/brgy/addBrgy', array('uses' => 'FileMaintenanceController@addBrgy', 'as' => 'addBrgy','middleware' => 'auth'));
			Route::post('/secret/addSecret', array('uses' => 'FileMaintenanceController@addSecret', 'as' => 'addSecret','middleware' => 'auth'));


			Route::get('/admin/accountAccessChecker/{event}', array('uses' => 'GlobalController@accountAccessChecker', 'as' => 'accountAccessChecker','
					middleware' => 'auth'));

			Route::get('/statsbox', array('uses' => 'GlobalController@statsbox', 'as' => 'statsbox'));
			Route::get('/statisticSummarry/{bid}/{year}', array('uses' => 'GlobalController@statisticSummarry', 'as' => 'statisticSummarry','
					middleware' => 'auth'));
			Route::get('/generateGraph/{bid}/{year}', array('uses' => 'GlobalController@generateGraph', 'as' => 'generateGraph','
					middleware' => 'auth'));
			Route::get('/householdMemInfo', array('uses' => 'GlobalController@householdMemInfo', 'as' => 'householdMemInfo','
					middleware' => 'auth'));

			Route::get('/chartStatS', array('uses' => 'GlobalController@chartStatS', 'as' => 'chartStatS','
					middleware' => 'auth'));
		});
	});
});
Route::group(array('prefix' => '/records'),function()
{
	Route::get('/household',array('uses' => 'RecordController@index', 'as' => 'gethousehold'));
	Route::get('/summary/{cid}/{year}',array('uses' => 'RecordController@brgySummary', 'as' => 'brgySummary'));
	Route::get('/brgySummaryGenerateLink',array('uses' => 'RecordController@brgySummaryGenerateLink', 'as' => 'brgySummaryGenerateLink'));
	Route::get('/member/{cid}',array('uses' => 'RecordController@getMembers', 'as' => 'getMembers'));
	Route::get('/houdeholdUrlGenerator',array('uses' => 'RecordController@houdeholdUrlGenerator', 'as' => 'houdeholdUrlGenerator'));
	Route::get('/generateHMemberUrl',array('uses' => 'RecordController@generateHMemberUrl', 'as' => 'generateHMemberUrl'));
	Route::group(array('before' => 'auth'), function()
	{
		Route::get('/{cid}',array('uses' => 'RecordController@getRecord', 'as' => 'getRecord'));

		Route::group(array('before' => 'csrf'), function()
		{
			Route::post('/saving',array('uses' => 'RecordController@savingRecordHousehold', 'as' => 'savingRecordHousehold'));
			Route::post('/savingHouseholdMember',array('uses' => 'RecordController@savingHouseholdMember', 'as' => 'savingHouseholdMember'));
		});
	});
});

Route::group(array('prefix' => '/filemaintenance'),function()
{
	Route::group(array('before' => 'auth'), function()
	{
		Route::get('/getBrgy', array('uses' => 'FileMaintenanceController@getBrgy', 'as' => 'getBrgy','middleware' => 'auth'));
		Route::get('/getSecret', array('uses' => 'FileMaintenanceController@getSecret', 'as' => 'getSecret','middleware' => 'auth'));
	});
});