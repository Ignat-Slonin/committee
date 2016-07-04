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




Route::auth();

Route::get('/', 'HomeController@index');



Route::get('/dashboard', [
    'uses' => 'Auth\AppController@getAdminDashboard',
    'as' => 'admin',
    'middleware' => 'role',
    'role' => ['admin']
]);


Route::get('/admin', [
    'uses' => 'Auth\AppController@getAdminPage',
    'as' => 'admin',
    'middleware' => 'role',
    'role' => ['admin']

]);



Route::post('/admin/assign-role', [
    'uses' => 'Auth\AppController@postAdminAssignRoles',
    'as' => 'admin.assign',
    'middleware' => 'role',
    'role' => ['admin']

]);

Route::delete('/admin/destroy/{id}', [
    'uses' => 'Auth\AppController@destroy',
    'as' => 'admin.destroy',
    'middleware' => 'role',
    'role' => ['admin']

]);



Route::group(['prefix'=>'post','middleware'=>'role', 'role' => ['admin']], function()
    {
        Route::resource('executive', 'PostExecutiveBodyController');
    });


Route::group(['prefix'=>'executive','middleware'=>'role', 'role' => ['admin']], function() {
    Route::resource('primary', 'ExecutiveCommitteePrimaryController');

});




Route::group(['prefix'=>'agent','middleware'=>'role', 'role' => ['admin','basic','primary']], function() {
    Route::resource('primary', 'AgentExecutiveCommitteePrimaryController');

});



Route::group(['prefix'=>'plan','middleware'=>'role', 'role' => ['primary']], function() {
    Route::resource('primary', 'PlanPrimaryController');
});


Route::group(['prefix'=>'plan','middleware'=>'role', 'role' => ['admin','basic','primary']], function() {
    Route::resource('calendar', 'CalendarPlanController');

});





Route::group(['prefix'=>'events'], function() {
    Route::resource('primary', 'EventPrimaryController');
    Route::resource('baseline', 'EventsBaslineController');
});








