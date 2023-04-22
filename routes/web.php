<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerifyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('verification', [VerifyController::class, 'verify']);
