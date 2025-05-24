<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});


//Auth Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/verify', function () {
    return view('auth.verify');
})->name('verify');
