<?php

namespace App\Http\Controllers;

use App\Models\MatchGame;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        return redirect(RouteServiceProvider::HOME);
    }
    public function home(){
        $matches = MatchGame::all();
        return view("user.home.index",compact("matches"));
    }
    public function quiz(){
        return view ("user.quiz");
    }
    
}
