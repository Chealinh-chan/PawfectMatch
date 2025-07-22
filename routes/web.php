<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Mail\MyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Pawfect Match Routes
|--------------------------------------------------------------------------
|
| These are all the public-facing routes for your website.
|
*/

// Home page
Route::get('/', [PageController::class, 'home'])->name('home');

// Pet Pages
Route::get('/pets', [PageController::class, 'pets'])->name('pets');
Route::get('/pets/all', [PageController::class, 'showAllPets'])->name('pets.all');
Route::get('/pets/{slug}', [PageController::class, 'showPet'])->name('pets.show');
// Route::get('/pets/detail', [PageController::class, 'showPet'])->name('pets.show');

// Appointment Pages
Route::get('/pets/{slug}/appoint', [PageController::class, 'showAppointmentForm'])->name('appointments.create');
Route::get('/pets/{slug}/appoint-redirect', [PageController::class, 'appointmentRedirect'])->name('appointment.redirect');
// Route::get('/appointments', [PageController::class, 'showAppointmentForm'])->name('appointments.show');
Route::post('/appointments/store', [PageController::class, 'storeAppointment'])->name('appointments.store');
Route::get('/appointments', [PageController::class, 'showAppointments'])->name('appointments.index');

// Care Pages
Route::get('/care/dog-basics', [PageController::class, 'showDogCare'])->name('care.dog');
Route::get('/care/cat-basics', [PageController::class, 'showCatCare'])->name('care.cat');

// Static Pages
Route::get('/about', [PageController::class, 'showAboutPage'])->name('about');
Route::get('/donate', [PageController::class, 'showDonatePage'])->name('donate');

// Contact Pages
Route::get('/contact', [PageController::class, 'showContactPage'])->name('contact');
Route::post('/contact', [PageController::class, 'storeContactForm'])->name('contact.store');

// Email
Route::get('/emails', function() {
    $name = "Email Test";
    Mail::to('cchan2@paragoniu.edu.kh')->send(new MyEmail($name));
    return 'Email sent successfully!';
})->name('emails');

/*
|--------------------------------------------------------------------------
| Laravel Breeze Authentication Routes
|--------------------------------------------------------------------------
|
| These routes are for logged-in users (dashboard, profile management).
| Do not remove these if you want login/registration to work.
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [PageController::class, 'destroy'])->name('profile.destroy');
});

// This file contains all the routes for login, registration, password reset, etc.
require __DIR__.'/auth.php';
