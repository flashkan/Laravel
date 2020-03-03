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


Route::get('/project', function () {
    return view('project');
})->name('project');

Route::group(
    [
        'prefix' => 'news',
        'as' => 'news.'
    ], function () {
    Route::get('/all', 'NewsController@all')->name('all');
    Route::get('/one/{news}', 'NewsController@one')->name('one')->middleware('private.news');
    Route::get('/category/{group}', 'NewsController@group')->name('group');
    Route::match(['get', 'post'], '/add', 'NewsController@add')->name('add')->middleware('auth');
    Route::match(['get', 'post'], '/update/{news}', 'NewsController@update')->name('update')->middleware('auth');
    Route::match(['get', 'post'], '/delete/{news}', 'NewsController@delete')->name('delete')->middleware('auth');
}
);

Route::group(
    [
        'prefix' => 'comment',
        'as' => 'comment.'
    ], function () {
    Route::get('/', 'CommentController@all')->name('all');
    Route::post('/', 'CommentController@add')->name('add')->middleware('auth');
}
);

Route::group(
    [
        'prefix' => 'proposal',
        'as' => 'proposal.',
    ], function () {
    Route::get('/all', 'ProposalController@all')->name('all')->middleware('auth');
    Route::get('/one/{proposal}', 'ProposalController@one')->name('one')->middleware('auth');
    Route::match(['get', 'post'], '/add', 'ProposalController@add')->name('add')->middleware('auth');
    Route::match(['get', 'post'], '/update/{proposal}', 'ProposalController@update')->name('update')->middleware('auth');
    Route::match(['get', 'post'], '/delete/{proposal}', 'ProposalController@delete')->name('delete')->middleware('auth');
}
);

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

