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