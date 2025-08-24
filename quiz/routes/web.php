<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
//Create
Route::get('/game/create', [GameController::class,'create']);
Route::post('/game', [GameController::class,'store']);


//Read
Route::get('/game', [GameController::class,'index']);
Route::get('/game/{id}', [GameController::class,'show']);

//Update
Route::get('/game/{id}/edit', [GameController::class,'edit']);
Route::put('/game/{id}', [GameController::class,'update']);

//Delete
Route::delete('/game/{id}', [GameController::class,'destroy']);