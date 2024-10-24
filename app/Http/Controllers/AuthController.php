<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function getMessage(): JsonResponse
    {
        return response()->json(['message' => 'Hello World!']);
    }
}
