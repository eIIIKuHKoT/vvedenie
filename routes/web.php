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

Route::get('/', 'IndexController@index');

Route::resource('/admin/user', 'UserController');
Route::resource('/admin/team-members', 'TeamMemberController');


/*dashboard */
Route::get('/admin', 'DashboardController@index');
Route::get('/admin/profile', 'DashboardController@profile')->name('admin.profile');
/*Route::get('/admin/users', 'DashboardController@users');*/


Auth::routes();