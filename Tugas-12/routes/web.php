<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
Route::get('/', [DashboardController::class, 'dashboard']);
Route::get('/register', [FormController::class, 'register']);
Route::post('/daftar', [FormController::class, 'submit']);

Route::get('/master', function(){
    return view('layout.master');
});