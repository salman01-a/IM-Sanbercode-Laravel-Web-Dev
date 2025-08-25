<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenreController;
Route::get('/', [DashboardController::class, 'dashboard']);
Route::get('/register', [FormController::class, 'register']);
Route::post('/daftar', [FormController::class, 'submit']);

// Route::get('/master', function(){
//     return view('layout.master');
// });

//Create
Route::get('/genre/create', [GenreController::class,'create']);
Route::post('/genre', [GenreController::class,'store']);


//Read
Route::get('/genre', [GenreController::class,'index']);
Route::get('/genre/{id}', [GenreController::class,'show']);

//Update
Route::get('/genre/{id}/edit', [GenreController::class,'edit']);
Route::put('/genre/{id}', [GenreController::class,'update']);

//Delete
Route::delete('/genre/{id}', [GenreController::class,'destroy']);

