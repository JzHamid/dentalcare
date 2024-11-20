<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::post('/create-account', [AccountController::class, 'signup'])->name('create.account');

Route::get('/login-account', [AccountController::class, 'login'])->name('login.account');
Route::get('/search', function () {return view('shop');})->name('shop');
Route::get('/user-profile', function () {return view('user');})->name('user');
Route::get('/admin', [PageController::class, 'admin'])->name('admin');

// Service
Route::post('/create-service', [AdminController::class, 'create_service'])->name('create.service');
Route::post('/edit-service/{id}', [AdminController::class, 'edit_service'])->name('edit.service');
Route::get('/get-service/{id}', [AdminController::class, 'get_service'])->name('get.service');
Route::delete('/delete-service/{id}', [AdminController::class, 'delete_service'])->name('destroy.service');

// Listing
Route::post('/create-listing', [AdminController::class, 'create_listing'])->name('create.listing');

Route::get('/', [PageController::class, 'index'])->name('landing');
Route::get('/login', function () {return view('login');})->name('login');
Route::get('/signup', function () {return view('signup');})->name('signup');
