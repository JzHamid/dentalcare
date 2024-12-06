<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::post('/create-account', [AccountController::class, 'signup'])->name('create.account');
Route::post('/update-user', [AccountController::class, 'update'])->name('update.account');
Route::post('/update-availability', [AccountController::class, 'availability'])->name('availability');

Route::get('/login-account', [AccountController::class, 'login'])->name('login.account');
Route::get('/search', [PageController::class, 'listing'])->name('listing');
Route::get('/clinic/{id}', [PageController::class, 'shop'])->name('shop');
Route::get('/clinic/{id}/appointment', [PageController::class, 'appointment'])->name('appointment')->middleware('auth');
Route::get('/user-profile', [PageController::class, 'user'])->name('user')->middleware('auth');
Route::get('/user-record/{id}', [AdminController::class, 'record_user'])->name('user.record')->middleware('auth');
Route::get('/superadmin', [PageController::class, 'superadmin'])->name('superadmin')->middleware('auth');
Route::post('/reset-password', [PageController::class]);

// Appointment
Route::post('/create-appointment/{id}', [AdminController::class, 'create_appointment'])->name('create.appointment')->middleware(['auth']);
Route::post('/reschedule-appointment/{id}', [AdminController::class, 'reschedule_appointment'])->name('reschedule.appointment')->middleware(['auth']);

Route::group(['middleware' => 'auth', 'admin'], function() {
    Route::get('/admin', [PageController::class, 'admin'])->name('admin');

    // Service
    Route::post('/create-service', [AdminController::class, 'create_service'])->name('create.service');
    Route::post('/edit-service/{id}', [AdminController::class, 'edit_service'])->name('edit.service');
    Route::get('/get-service/{id}', [AdminController::class, 'get_service'])->name('get.service');
    Route::delete('/delete-service/{id}', [AdminController::class, 'delete_service'])->name('destroy.service');

    // Dentist
    Route::post('/create-dentist', [AdminController::class, 'create_dentist'])->name('create.dentist');
    Route::get('/get-dentist/{id}', [AdminController::class, 'get_dentist'])->name('get.dentist');

    // Listing
    Route::post('/create-listing', [AdminController::class, 'create_listing'])->name('create.listing');
    Route::post('/edit-listing/{id}', [AdminController::class, 'edit_listing'])->name('edit.listing');
    Route::get('/get-listing/{id}', [AdminController::class, 'get_listing'])->name('get.listing');
    Route::delete('/delete-listing/{id}', [AdminController::class, 'delete_listing'])->name('destroy.listing');

    // Collaborator
    Route::post('/create-collab', [AdminController::class, 'create_collab'])->name('create.collab');
    Route::post('/edit-collab/{id}', [AdminController::class, 'edit_collab'])->name('edit.collab');
    Route::get('/get-collab/{id}', [AdminController::class, 'get_collab'])->name('get.collab');
    Route::delete('/delete-collab/{id}', [AdminController::class, 'remove_collab'])->name('destroy.collab');

    // Record
    Route::get('/record/{id}', [PageController::class, 'record'])->name('record.appointment');
    Route::post('/update-status/{id}', [AdminController::class, 'appointment_status'])->name('update.status');
});

Route::get('/', [PageController::class, 'index'])->name('landing');
Route::get('/login', function () {return view('login');})->name('login');
Route::get('/logout', [AccountController::class, 'logout'])->name('logout');
Route::get('/signup', function () {return view('signup');})->name('signup');
