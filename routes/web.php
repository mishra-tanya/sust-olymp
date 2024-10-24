<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/api/message', [AuthController::class, 'getMessage']);