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
// this is written for frontend view

// welcome 
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


// faculty
// the routes of faculty for views, create and edit
Route::get('/', 'frontend\FacultyController@index');
Route::get('faculty', 'frontend\FacultyController@faculty');
Route::get('frontend/faculty/edit/{parameter}',        	array('as'=>'frontend/faculty/edit','uses'=>'frontend\FacultyController@edit'));

//home
// the routes of home for editing and viewing 
Route::get('/home/edit/{parameter}',        	array('as'=>'home/edit','uses'=>'HomeController@edit'));
Route::patch('/home/{id}',      array('as'=>'home/update','uses'=>'HomeController@update'));
Route::get('/home', 'HomeController@index')->name('home');

// contact
Route::get('contact', function () {
    return view('frontend.contact');
});

// blog
Route::get('blog', function () {
    return view('frontend.blog');
});

// guest
Route::get('guest', function () {
    return view('guest');
});


// guest 
// the routes of guestt for views
Route::get('guest', 'frontend\FacultyController@guest');
Route::get('guest_faculty', 'frontend\GuestController@faculty');
Route::get('frontend/guest/guest/{parameter}',        	array('as'=>'frontend/guest/guest','uses'=>'frontend\GuestController@guest'));
Route::get('/guest/show/{id}',        	array('as'=>'frontend/guest/show','uses'=>'frontend\GuestController@show'));

// submission
// the routes of submission for views, create, update and delete
Route::get('/submission',        			array('as'=>'submission','uses'=>'frontend\SubmissionController@index'));
Route::get('/submission/create',        	array('as'=>'frontend/submission/create','uses'=>'frontend\SubmissionController@create'));
Route::post('/submission/store',        	array('as'=>'frontend/submission/store','uses'=>'frontend\SubmissionController@store'));
Route::get('/submission/edit/{parameter}',        	array('as'=>'frontend/submission/edit','uses'=>'frontend\SubmissionController@edit'));
Route::patch('/submission/update/{id}',      array('as'=>'frontend/submission/update','uses'=>'frontend\SubmissionController@update'));
Route::get('/submission/show/{id}',        	array('as'=>'frontend/submission/show','uses'=>'frontend\SubmissionController@show'));

Route::any('/search',        			array('as'=>'search','uses'=>'frontend\SearchController@index'));


// this is end for frontend view

// this is wriiten for the backend view
// this prefix route is written so that frontend viewers cannot enter to the backend
Route::group(['prefix' => 'backend','middleware' => ['auth']], function (){  


// dashboard
// for search functions and view    
Route::get('dashboard',array('as'=>'dashboard','uses'=>'backend\DashboardController@index'));
Route::get('pre_dashboard',array('as'=>'pre_dashboard','uses'=>'backend\Pre_DashboardController@index'));
Route::get('dashboard/search/{type?}',array('as'=>'dashboard/search/{type?}','uses'=>'backend\DashboardController@search'));

// user
// the routes of user for view,create, update and delete
Route::resource('user', 'backend\UserController');

//faculty
// the routes of faculty for view,create, update and delete
Route::resource('faculty', 'backend\FacultyController');

//home 
// the routes of home for view,create, update
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/edit/{parameter}',        	array('as'=>'home/edit','uses'=>'HomeController@edit'));
Route::patch('/home/{id}',      array('as'=>'home/update','uses'=>'HomeController@update'));

// submission
// the routes of submission for view,create, update and delete
Route::resource('submission', 'backend\SubmissionController');
Route::get('submission/show/{parameter}',        	array('as'=>'submission/show','uses'=>'backend\SubmissionController@show'));
Route::get('submission/date/{parameter}',        	array('as'=>'submission/date','uses'=>'backend\SubmissionController@date'));

// academic year
// the routes of academic year for for view,create, update and delete
Route::resource('academicyear', 'backend\Academic_yearController');

//Zip
// the routes of download for articles and images
Route::get('create-zip', 'ZipController@downloadZip')->name('create-zip');
Route::get('create-zip1', 'ZipController@downloadZip1')->name('create-zip1');

// contribution report
// the routes of contribution for view and search funciton
Route::get('report/contribution',        			array('as'=>'report/contribution','uses'=>'backend\ReportController@index'));
Route::get('report/search/{type?}',        	array('as'=>'report/search/{type?}','uses'=>'backend\ReportController@search'));

// contributor report
//  the routes of contributor for view and search funciton 
Route::get('report/contributor',        			array('as'=>'report/contributor','uses'=>'backend\ReportController@contributor'));
Route::get('report/search_1/{type?}',        	array('as'=>'report/search_1/{type?}','uses'=>'backend\ReportController@search_1'));

// percentage report
//  the routes of percentage for view and search funciton
Route::get('report/percentage',        			array('as'=>'report/percentage','uses'=>'backend\ReportController@percentage'));
Route::get('report/search_2/{type?}',        	array('as'=>'report/search_2/{type?}','uses'=>'backend\ReportController@search_2'));


//middel controller

Route::get('middle/contribution',        			array('as'=>'middle/contribution','uses'=>'backend\MiddleController@contribution'));
Route::get('middle/contributor',        			array('as'=>'middle/contributor','uses'=>'backend\MiddleController@contributor'));
Route::get('middle/percentage',        			array('as'=>'middle/percentage','uses'=>'backend\MiddleController@percentage'));
Route::get('middle/dashboard',        			array('as'=>'middle/dashboard','uses'=>'backend\MiddleController@dashboard'));

////



// contribution report
// the routes of contribution for view and search funciton
Route::get('pre_report/contribution',        			array('as'=>'pre_report/contribution','uses'=>'backend\Pre_ReportController@index'));
Route::get('pre_report/search/{type?}',        	array('as'=>'pre_report/search/{type?}','uses'=>'backend\Pre_ReportController@search'));

// contributor report
//  the routes of contributor for view and search funciton 
Route::get('pre_report/contributor',        			array('as'=>'pre_report/contributor','uses'=>'backend\Pre_ReportController@contributor'));
Route::get('pre_report/search_1/{type?}',        	array('as'=>'pre_report/search_1/{type?}','uses'=>'backend\Pre_ReportController@search_1'));

// percentage report
//  the routes of percentage for view and search funciton
Route::get('pre_report/percentage',        			array('as'=>'pre_report/percentage','uses'=>'backend\Pre_ReportController@percentage'));
Route::get('pre_report/search_2/{type?}',        	array('as'=>'pre_report/search_2/{type?}','uses'=>'backend\Pre_ReportController@search_2'));



///


// comment report
//  the routes of comment report for view and search funciton
Route::get('report/comment',        			array('as'=>'report/comment','uses'=>'backend\ReportController@comment'));
Route::get('report/search_3/{type?}',        	array('as'=>'report/search_3/{type?}','uses'=>'backend\ReportController@search_3'));

// commnet report after 14 days
//  the routes of comment report after 14 days for view and search funciton
Route::get('report/after_comment',        			array('as'=>'report/after_comment','uses'=>'backend\ReportController@aftercomment'));
Route::get('report/search_4/{type?}',        	array('as'=>'report/search_4/{type?}','uses'=>'backend\ReportController@search_4'));

//Activities
Route::get('log/activities', array('as' => 'log/activities', 'uses' => 'backend\ActivitiesController@index'));

// this is end for the backend view

});