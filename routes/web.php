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

//testing slug
Route::get('/test','FacadesController@test');

// Pages
Route::get('/', 'FacadesController@index')->middleware('auth');
Route::get('/members', 'FacadesController@members');
Route::get('/inventory','CostumesController@index');
Auth::routes();
Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('/login');
});

// Members CRUD
Route::POST('addMember','MembersController@addMember');
Route::POST('members/{id}/editMember','MembersController@editMember');
Route::get('/members/{id}','MembersController@showProfile')->name('member.profile')->middleware('auth');
Route::POST('members/{id}/deactivateMember','MembersController@deactivate');
Route::POST('members/{id}/activateMember','MembersController@activate');
//Classifications CRUD
Route::POST('addType','CostumesController@addType');
Route::POST('getCount','CostumesController@getCount');
Route::POST('deleteType','CostumesController@deleteType');


//Costume CRUD
Route::POST('addCostume','CostumesController@addCostume');
Route::get('test2','FacadesController@test2');
Route::get('/borrow','CostumesController@borrow');
Route::POST('/deleteCostume','CostumesController@deleteCostume');
