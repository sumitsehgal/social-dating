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
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact', 'HomeController@postContact');
Route::get('/about-us', 'HomeController@about')->name('about');

Route::get('/signup', function () {
    return view('users.register');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/allusers', 'HomeController@allUsers');
Route::get('/memberships', 'HomeController@memberships')->name('memberships');
Route::get('/user/{id}', 'UserController@userDetails');
Route::get('/profile', 'UserController@profile');
Route::post('/profile-post', 'UserController@postProfile');
Route::get('/membership/upgrade/{plan}', 'MembershipController@upgrade');
Route::post('/membership/upgrade/{plan}', 'MembershipController@postUpgrade');

Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

Route::post('/checkemail', 'UserController@checkEmail');

Route::get('/addfriend/{id}', 'UserController@addFriend');
Route::get('/cancelfriend/{id}', 'UserController@removeFriend');
Route::get('/approvefriend/{id}', 'UserController@acceptFriend');
Route::get('/declinefriend/{id}', 'UserController@declineFriend');
Route::get('/listusers', 'UserController@listings');

Route::get('/chat/initiate', 'ConversionController@initiate');
Route::get('/chat/recentmessages/{id}', 'ConversionController@recentmessages');
Route::post('/chat/sendmessage/{id}', 'ConversionController@sendMessage');
Route::get('/chat/receivemessage/{id}', 'ConversionController@retrieveMessages');
Route::get('/chat/readall/{id}', 'ConversionController@readAll');
Route::get('/chat/getallunread', 'ConversionController@getallunread');


