<?php

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('questions', 'QuestionsController')->except('show');
//Route::post('/questions/{question}/answers', 'AnswersController@store')->name('answers.store');
Route::resource('questions.answers', 'AnswersController');
//Route::resource('questions.answers', 'AnswersController')->except(['index', 'create', 'show']);
Route::get('/questions/{slug}', 'QuestionsController@show')->name('questions.show');
