<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/posts/create', [PageController::class, 'create']);
    Route::get('/posts/{post}/edit', [PageController::class, 'edit']);
    Route::put('/posts/{post}', [PageController::class, 'update']);
    Route::delete('/posts/{post}', [PageController::class, 'destory']);
    Route::post('/posts', [PageController::class, 'store']);
});

require __DIR__.'/auth.php';
