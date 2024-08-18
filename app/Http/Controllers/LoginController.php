<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function store(Request $request){

        $this->validate($request,[
            'email' =>'required|email',
            'password' => 'required|min:6'
        ]);


        if(!auth()->attempt($request->only('email', 'password'), $request->has('remember'))){
            return back()->with('error', 'Invalid credentials');
        }
        return redirect()->route('posts.index', auth()->user()->username)->with('succes', 'Login successful');
    }
}
