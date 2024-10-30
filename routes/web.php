<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestSeriesController;

Route::get('/', function () {
    return view('welcome'); 
}); 

Route::get('/all-series', function () {
    return view('series/series'); 
});

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');  
})->name('logout');

Route::get('/olympiad/{classSlug}', [TestSeriesController::class, 'show']);
Route::get('/test-series/{class}/{test}', [TestSeriesController::class, 'questions']);

Route::get('/api/message', [AuthController::class, 'getMessage']);