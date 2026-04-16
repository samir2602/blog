<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/hello', function () {
//     $user = "Parth";
//     return view('hello', ['user' => $user]);
// });

Route::get('/hello', [PageController::class, 'hello']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/posts', [PageController::Class, 'post']);
Route::get('/posts/create', [PageController::class, 'create']);
Route::get('/posts/{post}/edit', [PageController::class, 'edit']);
Route::put('/posts/{post}', [PageController::class, 'update']);
Route::delete('/posts/{post}', [PageController::class, 'destory']);
Route::post('/posts', [PageController::class, 'store']);