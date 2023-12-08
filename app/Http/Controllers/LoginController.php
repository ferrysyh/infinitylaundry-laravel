<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{

    public function postLogin(Request $request){
        if (Auth::attempt($request->only('email', 'password'))){
            return redirect('/dashboard');
        }
        return redirect('/');
    }
    
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function postRegist(Request $request){
        User::create([
            'name' => $request->name,
            'role' => $request->role,
            'balance' => 0,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return redirect('/');
    }
}
