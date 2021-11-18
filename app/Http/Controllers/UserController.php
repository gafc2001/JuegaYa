<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return redirect(RouteServiceProvider::HOME);
    }
    public function home(){
        return view("user.home.index");
    }
    
    public function profile(){
        return view("user.profile");
    }
    public function quiz(){
        return view ("user.quiz");
    }
    
}
