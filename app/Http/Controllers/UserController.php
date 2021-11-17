<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        return view("user.home");
    }
    
    public function profile(){
        return view("user.profile");
    }
    public function quiz(){
        return view ("user.quiz");
    }
    
}
