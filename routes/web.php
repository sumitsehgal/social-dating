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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@welcome')->name('welcome');

Route::get('/signup', function () {
    return view('users.register');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/memberships', 'HomeController@memberships')->name('memberships');
Route::get('/membership/upgrade/{plan}', 'MembershipController@upgrade');
Route::post('/membership/upgrade/{plan}', 'MembershipController@postUpgrade');
Route::get('/contact', 'HomeController@contact')->name('contact');

Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

Route::post('/checkemail', 'UserController@checkEmail');
