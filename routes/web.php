<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/questions', 'QuestionController@index');

Route::get('/questions/{question}', 'QuestionController@show');

Route::post('/questions/{question}/answers', 'AnswerController@store');

Route::post('/answers/{answer}/best', 'BestAnswersController@store')->name('best-answers.store');
