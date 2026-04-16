<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    $user = "Parth";
    return view('hello', ['user' => $user]);
});