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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/project', function () {
    return view('project');
});



Route::get('/news', function () {
    $news = [];
    for ($i = 1; $i < 10; $i++) {
        $news["news_$i"] = "Very interesting news $i. Very interesting news $i. Very interesting news $i.";
    }
    return view('news', ["news" => $news]);
});
