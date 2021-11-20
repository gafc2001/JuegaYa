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
        $credentials = $request->validate(User::$credentials);
        if(Auth::attempt($credentials)){
            // $request->session->regenerate();
            return redirect(RouteServiceProvider::HOME);
        }
        return back()->withErrors(User::$signin_error);
    }
    public function signup(Request $request){
        $request->validate(User::$credentials);

        User::insert([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        return view('auth.index');
    }
}
