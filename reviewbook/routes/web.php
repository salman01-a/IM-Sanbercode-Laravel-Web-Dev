<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\isAdmin;
use App\Models\Books;

Route::get('/', [DashboardController::class, 'dashboard']);
// Route::get('/register', [FormController::class, 'register']);
// Route::post('/daftar', [FormController::class, 'submit']);

// Route::get('/master', function(){
//     return view('layout.master');
// });

Route::middleware(['auth', isAdmin::class])->group(function () {
    //Create
    Route::get('/genre/create', [GenreController::class, 'create']);
    Route::post('/genre', [GenreController::class, 'store']);


    //Update
    Route::get('/genre/{id}/edit', [GenreController::class, 'edit']);
    Route::put('/genre/{id}', [GenreController::class, 'update']);

    //Delete
    Route::delete('/genre/{id}', [GenreController::class, 'destroy']);

    
});
//Auth
Route::post('/logout', [AuthController::class, 'logout']) -> middleware('auth');
Route::get('/profile', [AuthController::class, 'getprofile']);
Route::post('/profile',[AuthController::class, 'create'])->middleware('auth');
Route::put('/profile/{id}',[AuthController::class, 'updateProfile'])->middleware('auth');

Route::post('/comments/{id}' ,[CommentController::class,'comment']) ->middleware('auth');
//Read
Route::get('/genre', [GenreController::class, 'index']);
Route::get('/genre/{id}', [GenreController::class, 'show']);


//CRUD Books
Route::resource('books', BooksController::class);

//Auth
Route::get('/register', [AuthController::class, 'showregister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showlogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
