<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\MatchGame;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        return redirect(RouteServiceProvider::HOME);
    }
    public function home(Request $request){
        // $matches = "";
        if(isset($request->district)){
            $matches = MatchGame::where('district_id',$request->district)->get();
        }else{
            $matches = MatchGame::all();
        }
        $districts = District::all();
        return view("user.home.index",compact("matches",'districts'));
    }
    public function quiz(){
        return view ("user.quiz");
    }
    
}
