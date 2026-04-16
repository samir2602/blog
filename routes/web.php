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
Route::post('/posts', [PageController::class, 'store']);