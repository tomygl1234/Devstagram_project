<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store(){
        auth()->logout();
        return redirect()->route('login')->with('succes', 'You have been successfully logged out.');
    }
}