<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HealthRecordController;
use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/users/{id}', function ($id) {
    return response()->json(User::findOrFail($id));
});
Route::post('/users/update', [AdminController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('users.destroy');
Route::delete('/dentist/{id}', [AdminController::class, 'destroy'])->name('dentists.destroy');
Route::post('/update-patient', [AdminController::class, 'update_patient'])->name('update_patient.account');

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

// Transactions
Route::get('/users', [AppointmentController::class, 'showUsers']);
Route::post('/appointments/{id}/payment', [AppointmentController::class, 'storePayment'])->name('store.payment');

// Appointment
Route::post('/create-appointment/{id}', [AdminController::class, 'create_appointment'])->name('create.appointment')->middleware(['auth']);
Route::post('/reschedule-appointment/{id}', [AdminController::class, 'reschedule_appointment'])->name('reschedule.appointment')->middleware(['auth']);
Route::post('/reschedule-appointment-admin/{id}', [PageController::class, 'reschedule_appointment_admin'])->name('reschedule.appointment.admin')->middleware(['auth']);
Route::post('/reschedule-appointment-dentist/{id}', [AdminController::class, 'reschedule_appointment_dentist'])->name('reschedule.appointment.dentist')->middleware(['auth']);
Route::get('/appointment/{appointment}', [AdminController::class, 'show'])->name('appointment.show');
Route::post('/appointment/{appointment}', [AdminController::class, 'update'])->name('appointment.update');

Route::get('/appointments/{id}/record', [AppointmentController::class, 'viewRecord'])->name('appointments.record');
Route::post('/appointments/{id}/save-record', [AppointmentController::class, 'saveRecord'])->name('save.record');
Route::post('/appointments/{id}/update-status', [AppointmentController::class, 'updateStatus'])->name('update.status');

// OTP
Route::post('/otp-verify', [OtpController::class, 'verifyOtp'])->name('otp.verify.submit');
Route::post('/send-otp', [OtpController::class, 'sendOtp'])->name('otp.send');
Route::get('/otp-verify', [OtpController::class, 'showVerifyForm'])->name('otp.verify');

// Forgot Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Statistics
Route::get('/statistics/data', [StatisticsController::class, 'getStatistics'])->name('statistics.data');

// Health Record
Route::post('/health-records', [HealthRecordController::class, 'store'])->name('health-records.store');
Route::get('/users/{user}/records', [HealthRecordController::class, 'index'])->name('users.records');

Route::put('/unassign-secretary/{userId}', [AdminController::class, 'unassignSecretary'])->name('unassign.secretary');

Route::group(['middleware' => 'auth', 'admin'], function () {
    Route::get('/admin', [PageController::class, 'admin'])->name('admin');

    // Service
    Route::post('/create-service', [AdminController::class, 'create_service'])->name('create.service');
    Route::post('/edit-service/{id}', [AdminController::class, 'edit_service'])->name('edit.service');
    Route::get('/get-service/{id}', [AdminController::class, 'get_service'])->name('get.service');
    Route::delete('/delete-service/{id}', [AdminController::class, 'delete_service'])->name('destroy.service');

    // Dentist
    Route::post('/create-dentist', [AdminController::class, 'create_dentist'])->name('create.dentist');
    Route::get('/get-dentist/{id}', [AdminController::class, 'get_dentist'])->name('get.dentist');
    Route::put('/update-dentist', [AdminController::class, 'update_dentist'])->name('update.dentist');

    // Secretary
    Route::post('/create-secretary', [AdminController::class, 'create_secretary'])->name('create.secretary');
    Route::get('/get-secretary/{id}', [AdminController::class, 'get_secretary'])->name('get.secretary');
    Route::put('/update-secretary', [AdminController::class, 'update_secretary'])->name('update.secretary');
    Route::delete('/secretary/{id}', [AdminController::class, 'destroy_secretary'])->name('secretary.destroy');

    // Patient
    Route::get('/get-patient/{id}', [AdminController::class, 'get_patient'])->name('get.patient');
    Route::put('/update-patient', [AdminController::class, 'update_patient'])->name('update.patient');

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

    Route::get('/admin/add-collab', [AdminController::class, 'showAddCollaboratorModal'])->name('admin.add-collab');
    Route::post('/admin/create-collab', [AdminController::class, 'create_collab'])->name('create.collab');
    Route::post('/save-collaboration', [AdminController::class, 'saveCollaboration'])->name('save.collaboration');

    // Record
    Route::get('/record/{id}', [PageController::class, 'record'])->name('record.appointment');
    Route::post('/update-status/{id}', [AdminController::class, 'appointment_status'])->name('update.status');
    Route::post('/update-status-admin/{id}', [AdminController::class, 'appointment_status_admin'])->name('update.status.admin');
});

Route::get('/', [PageController::class, 'index'])->name('landing');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/logout', [AccountController::class, 'logout'])->name('logout');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');
