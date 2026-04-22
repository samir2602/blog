<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', function(Request $request){
    $user = User::where('email', $request->email)->first();

    if(!$user || !Hash::check($request->password, $user->password)) {

        return response()->json(['message', 'Invalid credentials'], 401);
    }

    $token = $user->createToken('api-token')->plainTextToken;
    return response()->json(['token' => $token]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/posts', [PostController::class, 'store']);
    Route::put('/posts/{post}', [PostController::class, 'update']);
    Route::delete('/posts/{post}', [PostController::class, 'destory']);
});
