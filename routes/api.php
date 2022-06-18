<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('version', function () {
    return 'v1';
});

Route::namespace('App\Http\Controllers\Api')->group(function () {
    Route::get('news', 'NewsController@index')->name('api.news.index');
    Route::get('news/{id}', 'NewsController@show')->name('api.news.show');

    Route::get('questions', 'QuestionsController@index')->name('api.questions.index');
    Route::get('questions/{id}', 'QuestionsController@show')->name('api.questions.show');

    Route::get('notices', 'NoticesController@index')->name('api.notices.index');
    Route::get('notices/{id}', 'NoticesController@show')->name('api.notices.show');

    Route::middleware([])->group(function () {
        Route::post('news', 'NewsController@store')->name('api.news.store');
        Route::patch('news/{id}', 'NewsController@update')->name('api.news.update');
        Route::delete('news/{id}', 'NewsController@delete')->name('api.news.delete');

        Route::post('questions', 'QuestionsController@store')->name('api.questions.store');
        Route::patch('questions/{id}', 'QuestionsController@update')->name('api.questions.update');
        Route::delete('questions/{id}', 'QuestionsController@delete')->name('api.questions.delete');

        Route::post('notices', 'NoticesController@store')->name('api.notices.store');
        Route::patch('notices/{id}', 'NoticesController@update')->name('api.notices.update');
        Route::delete('notices/{id}', 'NoticesController@delete')->name('api.notices.delete');
    });
});
