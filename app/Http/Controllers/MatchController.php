<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\MatchGame;
use App\Models\MatchStatus;
use App\Models\Sport;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.match.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::pluck('district','id');
        $sports = Sport::pluck('sport','id');
        return view('user.match.create',compact('districts','sports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MatchGame::insert([
            'host_user_id' => Auth::id(),
            'match_status_id' => MatchStatus::where('status','Previa')->first()->id,
            'sport_id' => $request->sport_id,
            'district_id' => $request->district_id,
            'date_time' => date('Y-m-d H:i:s',strtotime($request->date.$request->time)),
            'max_participants' => $request->district_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $match = MatchGame::find($id);
        return view('user.match.show',compact('match'));
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
