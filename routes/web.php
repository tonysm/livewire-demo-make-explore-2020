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

use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->middleware('guest');

Route::namespace('App\Http\Controllers')->group(function () {
    Auth::routes();
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [Controllers\HomeController::class,'index'])->name('home');
    Route::get('/slackish/{room?}', [Controllers\SlackishController::class, 'index'])->name('slackish');
    Route::resource('organisations', Controllers\OrganisationController::class)
        ->only(['index', 'create']);
    Route::resource('documents', Controllers\DocumentController::class)
        ->only(['index', 'store', 'edit']);
});
