<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.login');
});
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/checkuser', [UserController::class, 'checkuser'])->name('user.check');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/contact-list', [ContactController::class, 'index'])->middleware('auth')->name('contact.list');
    Route::get('/add-contact', [ContactController::class, 'create'])->middleware('auth')->name('contact.create');
    Route::post('/contact-save', [ContactController::class, 'store'])->name('contact.save');
    Route::post('/save', [UserController::class, 'store'])->name('user.save');
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/contact/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/contact/update/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::delete('/contact/delete/{id}', [ContactController::class, 'destroy'])->name('contact.delete');
});

