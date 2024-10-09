<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ProfileController;

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

//PERFIL
Route::get('/profile', [ProfileController::class, 'create']);
Route::post('/profile', [ProfileController::class, 'store']);

//MANEJO DE IMAGENES
Route::get('/image', [ImageController::class, 'create']);
Route::post('/image', [ImageController::class, 'store']);
