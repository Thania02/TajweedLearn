<?php

use Illuminate\Support\Facades\Auth;
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
    return view('pages.welcome', [
        'title' => 'Welcome',
    ]);
});

Route::get('/forgot_password', [App\Http\Controllers\UserController::class, 'forgot'])->name('forgot');
Route::post('/forgot_proses', [App\Http\Controllers\UserController::class, 'forgot_proses'])->name('forgot_proses');
Route::get('/reset_password/{id}', [App\Http\Controllers\UserController::class, 'reset'])->name('reset');
Route::post('/reset_proses', [App\Http\Controllers\UserController::class, 'reset_proses'])->name('reset_proses');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('home_admin', App\Http\Controllers\homeAdminController::class);
    Route::resource('learn_tajwid', App\Http\Controllers\learnTajwidController::class);
    Route::get('/Delete_learn/{id}', [App\Http\Controllers\learnTajwidController::class, 'Delete_learn']);
    Route::resource('quiz_phase1', App\Http\Controllers\quizPhase1Controller::class);
    Route::resource('quiz_phase2', App\Http\Controllers\quizPhase2Controller::class);
    Route::resource('my_proggress', App\Http\Controllers\myProggressController::class);
    Route::get('/result_quiz/{id}', [App\Http\Controllers\myProggressController::class, 'result_quiz']);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('profile', App\Http\Controllers\profileController::class);
    Route::get('/edit_profile/{id}', [App\Http\Controllers\profileController::class, 'edit_profile']);
    Route::post('/edit_profile_proses/{id}', [App\Http\Controllers\profileController::class, 'edit_profile_proses']);
    Route::resource('finish', App\Http\Controllers\AnswerQuestionController::class);

    Route::get('/quiz', function () {
        return view('pages.data-user.quiz.quiz', [
            'title' => 'Quiz',
        ]);
    });

    Route::get('/about', function () {
        return view('pages.data-user.about.about', [
            'title' => 'About',
        ]);
    });
});

Auth::routes();

// beberapa fungsi endpoint resource yang perlu kita ketahui:
// 1. Route get => nama_route => menjalankan fungsi index
// 2. Route get => nama_route/create => menjalankan fungsi create
// 3. Route post => nama_route => menjalankan fungsi store
// 4. Route get => nama_route/{ id } => menjalankan fungsi show
// 5. Route put/patch => nama_route/{ id } => menjalankan fungsi update
// 6. Route delete => nama_route/{ id } => menjalankan fungsi delete
// 7. Route get => nama_route/{ id }/edit => menjalankan fungsi edit