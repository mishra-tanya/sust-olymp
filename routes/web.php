<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestSeriesController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ResultController;


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

Route::post('/save-response', [TestController::class, 'saveResponse'])->name('save.response');
Route::get('/get-saved-responses/{class_id}/{test_id}', [TestController::class, 'getSavedResponses']);
Route::post('/submit-test', [TestController::class, 'submitTest'])->name('submit.test');
Route::get('/result/{class_id}/{test_id}', [ResultController::class, 'showResults']);

Route::get('/api/message', [AuthController::class, 'getMessage']);