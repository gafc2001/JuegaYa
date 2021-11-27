<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.index');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function signin(Request $request){
        $credentials = $request->validate(User::$signin);
        if(Auth::attempt($credentials)){
            if(!is_null(Auth::user()->profile()))
                    return redirect(RouteServiceProvider::HOME);
            else{
                return redirect()->route('quiz.index');
            }
        }
        return redirect()->route('login')->withErrors(User::$signin_error);
    }
    public function signup(Request $request){
        $request->validate(User::$signup,User::$signup_msg);

        User::insert([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        return redirect()->route('login');
    }
}
