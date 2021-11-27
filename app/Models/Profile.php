<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'age',
        'high',
        'time_playing',
        'profile_picture',
        'gender',
        'sport_id',
        'district_id'
    ];
    protected $casts = [
        'time_playing' => 'date:Y-m-d',
        'high' => 'double',
        'age' => 'date:Y-m-d'
    ];
    public static $validation = ['user_id',
    'first_name'  => 'required',
    'last_name'  => 'required',
    'age'  => 'required',
    'high'  => 'required',
    'time_playing'  => 'required',
    'gender'  => 'required',
    'sport_id'  => 'required',
    'district_id'  => 'required',
    ];
    public function getFullName(){
        if(is_null($this->first_name) && is_null($this->first_name)){
            return "No definido";
        }
        else{
            return "{$this->first_name} {$this->last_name}";
        }
    }
    public function getTimePlaying(){
        Carbon::setLocale('es');
        $now = Carbon::now();
        $time = Carbon::createFromDate($this->time_playing);
        return $time->diffForHumans($now);
    }

    public function district(){
        if(is_null($this->belongsTo(District::class)->first())){
            return "No definido";
        }else{
            return $this->belongsTo(District::class)->first()->district;
        }
    }
    public function sport(){
        if(is_null($this->belongsTo(Sport::class)->first())){
            return "No definido";
        }else{
            return $this->belongsTo(Sport::class)->first()->sport;
        }
    }
    public function getAge(){
        Carbon::setLocale('es');
        $now = Carbon::now();
        $date = $this->age;
        return $date->diffInYears($now) . " años";
    }
}
