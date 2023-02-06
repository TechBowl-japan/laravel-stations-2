<?php

use App\Http\Controllers\Admin\MovieController as AdminMovieController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\ScheduleController as AdminScheduleController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SheetController;
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
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/sheets', [SheetController::class, 'index'])->name('sheets.index');
Route::get('/movies/{movieId}/schedules/{scheduleId}/sheets', [SheetController::class, 'reserve'])->name('sheets.reserve');
Route::get('/movies/{movieId}/schedules/{scheduleId}/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservations/store', [ReservationController::class, 'store'])->name('reservations.store');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Movie
    Route::get('/movies', [AdminMovieController::class, 'index'])->name('movies.index');
    Route::get('/movies/create', [AdminMovieController::class, 'create'])->name('movies.create');
    Route::post('/movies/store', [AdminMovieController::class, 'store'])->name('movies.store');
    Route::get('/movies/{id}/edit', [AdminMovieController::class, 'edit'])->name('movies.edit');
    Route::patch('/movies/{id}/update', [AdminMovieController::class, 'update'])->name('movies.update');
    Route::delete('/movies/{id}/destroy', [AdminMovieController::class, 'destroy'])->name('movies.destroy');
    Route::get('/movies/{id}', [AdminMovieController::class, 'show'])->name('movies.show');

    // Schedule
    Route::get('/movies/{id}/schedules/create', [AdminScheduleController::class, 'create'])->name('schedules.create');
    Route::post('/movies/{id}/schedules/store', [AdminScheduleController::class, 'store'])->name('schedules.store');
    Route::get('/schedules/{scheduleId}/edit', [AdminScheduleController::class, 'edit'])->name('schedules.edit');
    Route::patch('/schedules/{id}/update', [AdminScheduleController::class, 'update'])->name('schedules.update');
    Route::delete('/schedules/{id}/destroy', [AdminScheduleController::class, 'destroy'])->name('schedules.destroy');

    // Reservation
    Route::resource('/reservations', AdminReservationController::class);
});

Route::get('/practice', [PracticeController::class, 'sample']);
Route::get('/practice2', [PracticeController::class, 'sample2']);
Route::get('/practice3', [PracticeController::class, 'sample3']);
Route::get('/getPractice', [PracticeController::class, 'getPractice']);
