<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AppointmentController;

// Home route
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('pets', PetController::class);
Route::resource('appointments', AppointmentController::class);