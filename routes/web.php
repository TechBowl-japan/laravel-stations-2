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

Route::get('/', function () {
    return view('welcome');
});
//1~3
Route::get('/practice',[App\Http\Controllers\PracticeController::class, 'sample']);
Route::get('/practice2',[App\Http\Controllers\PracticeController::class, 'sample2']);
Route::get('/practice3',[App\Http\Controllers\PracticeController::class, 'sample3']);
//4~5
Route::get('/getPractice',[App\Http\Controllers\PracticeController::class, 'getPractice']);
//6
Route::get('/movies',[App\Http\Controllers\MovieController::class, 'movies']);
//7
Route::get('/admin/movies',[App\Http\Controllers\MovieController::class, 'index']);