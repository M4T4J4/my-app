<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

Route::get('/', [HomeController::class, 'home'])
    ->name('home');

Route::get('/about',[HomeController::class, 'about'])
    ->name('about');

Route::match(['get','post'],'/dashboard',[HomeController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

Route::post('/exist_email',[LoginController::class, 'existEmail'])
    ->name('exist_email');