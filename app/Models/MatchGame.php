<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class MatchGame extends Model
{
    protected $table = "matches";
    

    public function participants(){
        return $this->hasMany(Participant::class,'match_id');
    }
    public function host(){
        return $this->belongsTo(User::class,'host_user_id',)->first();
    }
    public function district(){
        return $this->belongsTo(District::class)->first()->district;
    }
    public function status(){
        return $this->belongsTo(MatchStatus::class,'match_status_id')->first()->status;
    }
    public function countParticipants(){
        return $this->hasMany(Participant::class,'match_id')->count();
    }

    public function date(){
        return Carbon::parse($this->date_time)->format('d/m/Y');
    }
    public function time(){
        return Carbon::parse($this->date_time)->format('g:i A');
    }
    
    public function getStatus(){
        $date = Carbon::parse($this->date_time);
        $now = Carbon::now();
        $diffInHours = $date->diffInHours($now);
        $isPast = $date->isPast();
        if($isPast){
            if($diffInHours > 1.5){
                $this->match_status_id= 3;
            }else{
                $this->match_status_id= 2;
            }
        }
        $this->save();
        return $this->status();
    }
    public function getClass(){
        switch($this->status()){
            case "Previa":
                return "pre-game";
                break;
            case "En juego";
                return "in-game";
                break;
            case "Finalizado";
                return "ended";
                break;
        }
    }
    public function participantsAcepted(){
        return $this->participants()->where('status','ACEPTADO');
    }

    public function countRequest(){
        return $this->participants()->where('status','PENDIENTE');
    }
    
    public function participantsRequests(){
        return $this->participants()->where('status','PENDIENTE');
    }

}
