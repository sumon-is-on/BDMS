<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DonorController;
use App\Http\Controllers\Backend\PatientController;
use App\Http\Controllers\Backend\RequestController as BackendRequestController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Web\AuthController as WebAuthController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\DonationController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\RequestController;

Route::get('/',[HomeController::class,'home'])->name('web.home');


# Web Login
Route::get('user_login',[WebAuthController::class,'webLogin'])->name('user.login');
Route::post('user_login_post',[WebAuthController::class,'loginPost'])->name('user.login.post');
Route::get('user_logout',[WebAuthController::class,'logout'])->name('user.logout');
#Registration
Route::get('user_registration',[WebAuthController::class,'registration'])->name('user.registration');
Route::post('user_registration',[WebAuthController::class,'registrationPost'])->name('user.registration.post');


#userProfile
Route::get('profile/{id}',[HomeController::class,'profile'])->name('web.user.profile');
Route::get('profile_edit/{id}',[HomeController::class,'edit'])->name('web.profile.edit');
Route::put('profile_update/{id}',[HomeController::class,'update'])->name('web.profile.update');

# Blood Request List In web
Route::get('br_list',[RequestController::class,'index'])->name('web.request.list');
Route::get('br_show/{id}',[RequestController::class,'show'])->name('web.request.show');
# Blood Request
Route::get('/blood_request',[RequestController::class,'create'])->name('request.create');
Route::post('/blood_request_post',[RequestController::class,'store'])->name('request.post');

#Donation
Route::get('donation_create/{id}',[DonationController::class,'create'])->name('donation.create');
Route::post('donation_store',[DonationController::class,'store'])->name('donation.store');


#Contact
Route::get('contact_create',[ContactController::class,'create'])->name('contact.create');



# ADMIN PANEL
#ADMIN authLogin
Route::get('admin_login',[AuthController::class,'login'])->name('admin.login');
Route::post('admin_login_post',[AuthController::class,'loginPost'])->name('admin.login.post');

Route::middleware('auth')->group(function(){

    # logout
    Route::get('admin_logout',[AuthController::class,'logout'])->name('admin.logout');
    # Dashboard
    Route::get('/admin',[DashboardController::class,'dashboard'])->name('backend.dashboard');

    #user
    Route::get('user_index',[UserController::class,'index'])->name('user.index');
    Route::get('user_create',[UserController::class,'create'])->name('user.create');
    Route::post('user_create',[UserController::class,'post'])->name('user.post');
    Route::get('user_view/{id}',[UserController::class,'show'])->name('user.show');
    Route::get('user_edit/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::put('user_update/{id}',[UserController::class,'update'])->name('user.update');
    Route::get('user_delete/{id}',[UserController::class,'delete'])->name('user.delete');

    # Patients
    Route::get('patient_index',[PatientController::class,'index'])->name('patient.index');
    Route::get('patient_view/{id}',[PatientController::class,'show'])->name('patient.show');

    # Patients
    Route::get('donor_index',[DonorController::class,'index'])->name('donor.index');
    Route::get('donor_view/{id}',[DonorController::class,'show'])->name('donor.show');


    # Blood Request
    Route::get('blood_request_list',[BackendRequestController::class,'index'])->name('backend.request.list');

    #Service
    Route::get('service_index',[ServiceController::class,'index'])->name('service.index');
    Route::get('service_create',[ServiceController::class,'create'])->name('service.create');
    Route::post('service_store',[ServiceController::class,'store'])->name('service.store');
    Route::get('service_edit/{id}',[ServiceController::class,'edit'])->name('service.edit');
    Route::put('service_update/{id}',[ServiceController::class,'update'])->name('service.update');
    Route::get('service_delete/{id}',[ServiceController::class,'delete'])->name('service.delete');
});




