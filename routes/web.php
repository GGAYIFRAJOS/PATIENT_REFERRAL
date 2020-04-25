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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function(){

	Route::get('referrals/create/{doctor_id?}', 'ReferralsController@create');

    Route::get('/show_hospital_doctors/{hospital_id}', ['as' => 'show_hospital_doctors', 'uses'=>'HospitalsController@show_hospital_doctors']);

    Route::get('doctors/show_all',['as' => 'show_all_doctors', 'uses'=>'DoctorsController@show_all_doctors']);

    Route::get('hospitals/show_all',['as' => 'show_all_hospitals', 'uses'=>'HospitalsController@show_all_hospitals']);

    Route::get('patients/show_all',['as' => 'show_all_patients', 'uses'=>'PatientsController@show_all_patients']);

    Route::get('referrals/show_all',['as' => 'show_all_referrals', 'uses'=>'ReferralsController@show_all_referrals']);

	Route::post('doctors/adduser', 'DoctorsController@adduser')->name('doctors.adduser');
	Route::resource('hospitals','HospitalsController');
	Route::resource('patients','PatientsController');
	Route::resource('doctors','DoctorsController');
    Route::resource('referrals','ReferralsController');
    Route::resource('departments','DepartmentsController');
	Route::resource('users','UsersController');
	Route::resource('comments','CommentsController');
    Route::resource('roles','RolesController');

    Route::get('/recieved',['as' => 'referrals.recieved', 'uses'=>'ReferralsController@recieved']);

    Route::get('/show_doctors/{hospital_id}',['as' => 'show_doctors', 'uses'=>'HospitalsController@show_doctors']);

    Route::get('/hospital_patients/{hospital_id}',['as' => 'hospital_patients', 'uses'=>'HospitalsController@hospital_patients']);
});


