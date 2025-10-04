<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;


Route::middleware(['auth'])->group(function () {
    Route::get('/appointment', [RecordController::class, 'createAppointment'])->name('appointment.create');
    Route::post('/appointment', [RecordController::class, 'storeAppointment'])->name('appointment.store');
    Route::get('/my-records', [RecordController::class, 'myRecords'])->name('records.my');
    Route::get('/get-doctors/{postId}', [RecordController::class, 'getDoctorsByPost'])->name('doctors.by.post');
});

Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('doctors', DoctorController::class);
    Route::resource('records', RecordController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('users', UserController::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
