<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Recomendation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('profile')->only('index');
    }
    public function index()
    {
        return view('user.profile.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return dd($request->all());
        
        $file = $request->file('profile_picture');
        $file_name = $file->hashName();
        $upload_success = Storage::disk('public')->put('img/profile',$file);
        $profile = Profile::create([
            'user_id' => Auth::id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'high' => $request->high,
            'time_playing' => $request->time_playing,
            'favorite_sport' => $request->favorite_sport,
            'gender' => $request->gender,
            'profile_picture' => $file_name,
        ]);
        return view('user.profile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.profile.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $user = User::find($id);
        $user = User::find($id);
        return view('user.profile.edit',compact('user'));
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
        $profile = User::find($id)->profile();
        $file = $request->file('profile_picture');
        $file_name = "";
        //Check if the user send an image
        if(!is_null($file)){
            //Delete the image if exists
            $exists = Storage::disk('public')->exists('img/profile/'.$profile->profile_picture);
            if($exists){
                $delete = Storage::disk('public')->delete('img/profile/'.$profile->profile_picture);
            }

            // //Save the image
            Storage::disk('public')->put('img/profile',$file);
            $file_name = $file->hashName();
        }else{
            $file_name = $profile->profile_picture;
        }
        $profile->update([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'age'=> $request->age,
            'high'=> $request->high,
            'time_playing'=> $request->time_playing,
            'favorite_sport'=> $request->favorite_sport,
            'profile_picture'=> $file_name,
            'gender'=> $request->gender,
        ]);
        return redirect()->route('profile.index');
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

    public function comment($id)
    {   
        $user = User::find($id);
        return view('user.profile.comments')->with('user', $user);
    }
    public function saveComment(Request $request,$id)
    {
        $data = json_decode($request->getContent());
        User::find($id);
        $recomendation = Recomendation::create([
            'comment' => $data->comment,
            'rank' => $data->rank,
            'comment_user_id' => $data->comment_user_id,
            'user_id' => $id,
        ]);

        return response()->json([
            'picture' => $recomendation->user()->getProfilePicture(),
            'full_name' => $recomendation->user()->profile()->getFullName(),
            'rank' => $recomendation->rank,
            'date' => $recomendation->getDate(),
            'comment' => $recomendation->comment
        ]);
    }
}
