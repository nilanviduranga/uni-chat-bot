<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\OtpLoginController;
use Illuminate\Support\Facades\Route;



//Auth Routes
Route::get('/login', [OtpLoginController::class, 'showEmailForm'])->name('login');
Route::post('/login-request', [OtpLoginController::class, 'requestOtp'])->name('login-request');
Route::post('/verify-otp', [OtpLoginController::class, 'verifyOtp'])->name('verify-otp');
Route::post('/logout', [OtpLoginController::class, 'logout'])->name('logout');


// Chat Routes
Route::middleware(['auth'])->get('/', [ChatController::class, 'index'])->name('home');
Route::middleware(['auth'])->post('/message/send', [ChatController::class, 'sendMessage'])->name('message.send');


Route::middleware(['auth'])->get('/chat/history', [ChatController::class, 'chatHistory'])->name('message.send');
Route::middleware(['auth'])->get('/chat/history/get/{id?}', [ChatController::class, 'chatHistoryget'])->name('message.send');


