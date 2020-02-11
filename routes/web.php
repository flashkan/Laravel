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

Route::get('/', ['uses' => 'HomeController@index']);

Route::get('/news', ['uses' => 'NewsController@index']);

Route::get('/news_category', ['uses' => 'NewsController@category']);

Route::get('/news/{id}', ['uses' => 'NewsController@newsOne']);

Route::get('/project', function () {
    return view('project');
});

