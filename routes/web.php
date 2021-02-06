<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','Frontend\HomeController@index')->name('main');

Auth::routes();
Route::get('/company/register','Auth\RegisterController@companyRegister')->name('company.register');
Route::post('/company/save','Auth\RegisterController@companySave')->name('company.save');

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'admin'], function () {
	Route::resource('user', 'User\UserController');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'User\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'User\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'User\ProfileController@password']);
	Route::resource('/job','Admin\JobController');
	Route::get('/company/profile','User\ProfileController@companyProfile')->name('company.profile');
	Route::put('/company/profile/{id}','User\ProfileController@editcompanyProfile')->name('company.edit');

});
//frontend Routes
Route::get('/view/job','Frontend\JobController@index')->name('view.job');
Route::get('/view/job/{id}','Frontend\JobController@show')->name('edit.job');
Route::post('/salary/predict', 'Frontend\Jobcontroller@predictSalary')->name('salary.predict');

Route::get('/employee', function () {
    return view('hello');
});