<?php

use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\HospitalController;
use App\Http\Controllers\Admin\HospitalDoctorsController;
use App\Http\Controllers\Admin\PatientControler;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SpecialityController;
use App\Http\Controllers\Doctor\EducationController;
use App\Http\Controllers\Doctor\ExperienceController;
use App\Http\Controllers\Doctor\ScheduleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/blog-list', function () {
    return view('blog-list');
})->name('blog-list');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');
Route::get('/optimize', [HomeController::class, 'optimize']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    // Admin Routes
    Route::resource('hospitalDoctors', HospitalDoctorsController::class);

    Route::resource('speciality', SpecialityController::class);
    Route::resource('hospital', HospitalController::class);
    Route:: resource('doctor', DoctorController::class);
    Route::resource('patient', PatientControler::class);
    Route::resource('profile', ProfileController::class);

    //Doctor route
    Route::resource('education', EducationController::class);
    Route::resource('experience', ExperienceController::class);
    Route::resource('schedule', ScheduleController::class);
});

require __DIR__ . '/auth.php';


