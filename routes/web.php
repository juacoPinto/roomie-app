<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

//REGISTER - USER
Route::get('/user', [UserController::class, 'create']);
Route::post('/user', [UserController::class, 'store']);
Route::get('/user/{user}', [UserController::class, 'show']);
Route::get('/user/{user}/edit', [UserController::class, 'edit']);
Route::patch('/user/{user}', [UserController::class, 'update']);

//LOGIN
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

//PERFIL
Route::get('/profile', [ProfileController::class, 'create']);
Route::post('/profile', [ProfileController::class, 'store']);
Route::get('/profile/{profile}', [ProfileController::class, 'show']);
Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit']);
Route::patch('/profile/{profile}', [ProfileController::class, 'update']);

//MANEJO DE IMAGENES
Route::get('/image', [ImageController::class, 'create']);
Route::post('/image', [ImageController::class, 'store']);

//DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index']);
