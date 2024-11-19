<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::post('/create-account', [AccountController::class, 'signup'])->name('create.account');
Route::get('/login-account', [AccountController::class, 'login'])->name('login.account');

Route::get('/', function () {return view('landing');});
Route::get('/login', function () {return view('login');})->name('login');
Route::get('/signup', function () {return view('signup');})->name('signup');
