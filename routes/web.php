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
    Route::get('/all', 'NewsController@index')->name('all');
    Route::get('/one/{id}', 'NewsController@newsOne')->name('one');
    Route::get('/category/{id}', 'NewsController@group')->name('category');
    Route::get('/create', 'NewsController@pageCreate')->name('page.create');
    Route::post('/create', 'NewsController@createNews')->name('create.news');
}
);

Route::get('/comments', 'CommentsController@index')->name('comments');
Route::post('/comments', 'CommentsController@createComment')->name('commentCreate');

Route::group(
    [
        'prefix' => 'proposal',
        'as' => 'proposal.'
    ], function () {
    Route::get('/all', 'ProposalController@proposalAll')->name('all');
    Route::get('/one/{id}', 'ProposalController@proposalOne')->name('one');
    Route::get('/create', 'ProposalController@pageCreate')->name('page.create');
    Route::post('/create', 'ProposalController@createProposal')->name('create');
}
);


Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
