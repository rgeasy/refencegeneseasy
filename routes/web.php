<?php

use App\Http\Controllers\AdminController;
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
//LocalizationController
Route::get('lang/{locale}', 'LocalizationController@index');
Route::get('/language', 'LocalizationController@language');

//HomeController
Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
Route::get('/home', 'HomeController@home')->name('home');
//LoginController
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//RegsiterController
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::get('password/forgotpassword', 'Auth\ForgotPasswordController@forgotPassword')->name('password.forgotpassword'); //1
Route::post('password/resetpassword', 'Auth\ForgotPasswordController@resetPasswordEMail')->name('resetpassword');	//2
Route::get('password/{user}/{token}/reset', 'Auth\ResetPasswordController@resetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@resetar')->name('password.update');
//Classes
Route::get('/species/edit', 'SpeciesController@editar');
Route::get('/species/activate','SpeciesController@activate');
Route::post('/articles/activate','SpeciesController@ativar');
//Route::post('/species/activate','SpeciesController@ativar');
Route::resource('/species', 'SpeciesController')->except(['edit']);
Route::resource('/genes', 'GeneController');

//Reffinder
Route::post('reffinder', 'ReffinderController@index');

//Route::auth();
//Route::get('/t', 'HomeController@t');

Route::get('/admin','Admin\AdminController@index')->name('admin')->middleware('auth');
Route::get('/admin/species','Admin\AdminController@species')->middleware('auth');
Route::get('/admin/articles','Admin\AdminController@articles')->middleware('auth');
Route::get('/admin/species/{species}/edit','SpeciesController@edit')->middleware('auth');
Route::get('/admin/article/{article}/edit','ArticleController@edit')->middleware('auth');
Route::put('/articles/{article}','ArticleController@update')->middleware('auth');
//Route::get('/admin/users',[AdminController::class, 'editUser'])->middleware('auth');

