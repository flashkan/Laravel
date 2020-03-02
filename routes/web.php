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

Route::get('/', 'HomeController@index')->name('home');

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

Route::get('/comments', 'CommentsController@index')->name('comments')->middleware('auth');
Route::post('/comments', 'CommentsController@createComment')->name('commentCreate')->middleware('auth');

Route::group(
    [
        'prefix' => 'proposal',
        'as' => 'proposal.',
    ], function () {
    Route::get('/all', 'ProposalController@proposalAll')->name('all')->middleware('auth');
    Route::get('/one/{id}', 'ProposalController@proposalOne')->name('one')->middleware('auth');
    Route::get('/create', 'ProposalController@pageCreate')->name('page.create')->middleware('auth');
    Route::post('/create', 'ProposalController@createProposal')->name('create')->middleware('auth');
}
);

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
