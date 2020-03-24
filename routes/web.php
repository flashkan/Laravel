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

Route::group(
    [
        'prefix' => 'news',
        'as' => 'news.'
    ], function () {
    Route::get('/all', 'NewsController@all')->name('all');
    Route::get('/one/{news}', 'NewsController@one')->name('one')->middleware('private.news');
    Route::get('/category/{group}', 'NewsController@group')->name('group');
    Route::match(['get', 'post'], '/add', 'NewsController@add')->name('add')->middleware('is.admin');
    Route::match(['get', 'post'], '/update/{news}', 'NewsController@update')->name('update')->middleware('is.admin');
    Route::match(['get', 'post'], '/delete/{news}', 'NewsController@delete')->name('delete')->middleware('is.admin');
}
);

Route::group(
    [
        'prefix' => 'proposal',
        'as' => 'proposal.',
    ], function () {
    Route::get('/all', 'ProposalController@all')->name('all')->middleware('is.admin');
    Route::get('/one/{proposal}', 'ProposalController@one')->name('one')->middleware('is.admin');
    Route::match(['get', 'post'], '/add', 'ProposalController@add')->name('add')->middleware('auth');
    Route::match(['get', 'post'], '/update/{proposal}', 'ProposalController@update')
        ->name('update')
        ->middleware('is.admin');
    Route::match(['get', 'post'], '/delete/{proposal}', 'ProposalController@delete')
        ->name('delete')
        ->middleware('is.admin');
}
);

Route::group(
    [
        'prefix' => 'profile',
        'as' => 'profile.',
        'middleware' => 'is.admin'
    ], function () {
    Route::get('/all', 'ProfileController@all')->name('all');
    Route::get('/toggle/{user}', 'ProfileController@toggle')->name('toggle');
}
);


Route::group(
    [
        'prefix' => 'resources',
        'as' => 'resources.',
        'middleware' => 'is.admin'
    ], function () {
    Route::get('/all', 'ResourcesController@all')->name('all');
    Route::match(['get', 'post'], '/add', 'ResourcesController@add')->name('add');
    Route::match(['get', 'post'], '/update/{resources}', 'ResourcesController@update')->name('update');
    Route::match(['get', 'post'], '/delete/{resources}', 'ResourcesController@delete')->name('delete');
}
);

Route::get('/auth/vk', 'LoginController@loginVK')->name('vkLogin');
Route::get('/auth/vk/response', 'LoginController@responseVK')->name('vkResponse');
Route::get('/auth/fb', 'LoginController@loginFB')->name('fbLogin');
Route::get('/auth/fb/response', 'LoginController@responseFB')->name('fbResponse');
Route::get('/parser/index', 'ParserController@index')->name('parser.index')->middleware('is.admin');

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::post('/comment', 'CommentController@add')->name('comment.add')->middleware('auth');
