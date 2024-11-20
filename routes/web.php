<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::post('/create-account', [AccountController::class, 'signup'])->name('create.account');
Route::get('/login-account', [AccountController::class, 'login'])->name('login.account');
Route::get('/search', function () {return view('shop');})->name('shop');
Route::get('/user-profile', function () {return view('user');})->name('user');
Route::get('/admin', function () {return view('admin');})->name('admin');

Route::get('/', [PageController::class, 'index'])->name('landing');
Route::get('/login', function () {return view('login');})->name('login');
Route::get('/signup', function () {return view('signup');})->name('signup');
