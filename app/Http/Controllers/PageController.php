<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function hello()
    {
        $user = "samir";
        return view('hello', ['user' => $user]);
    }
}
