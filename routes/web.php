<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    return view('welcome');
});

//REGISTER
Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);

//LOGIN
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
