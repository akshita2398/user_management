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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {
    // Route::resource('roles','RoleController');
    Route::resource('roles', 'RoleController', [
	    'names' => [
	        'index' => 'roles.index',
	        'store' => 'roles.store',
	        'edit' => 'roles.edit',
	        'show' => 'roles.show',
	    ]
	]);

    Route::resource('users','UserController');
});




