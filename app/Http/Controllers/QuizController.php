<?php

namespace App\Http\Controllers;

use App\Models\Hobbie;
use App\Models\Profile;
use App\Models\Question;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        $sports = Sport::all();
        $hobbies = Hobbie::all();
        return view('user.quiz.index',compact('questions','sports','hobbies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode($request->getContent());
        $user = Auth::user();
        $profile = Profile::insert([
            'user_id' => $user->id,
            'age' => $data->AGE,
            'gender' => $data->GENDER,
            'hobbie_id' => $data->HOBBIE,
            'preferred_position' => $data->POSITION,
            'time_playing' => $data->TIME_PLAYING,
            'sport_id' => $data->SPORT,
        ]);

        return response()->json(['message'=>"Profile saved"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
