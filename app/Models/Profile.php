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
    ];
    public function getFullName(){
        return "{$this->first_name} {$this->last_name}";
    }
    public function getTimePlaying(){
        $now = Carbon::now();
        $time = Carbon::createFromDate($this->time_playing);
        return $time->diffForHumans($now);
    }

    public function district(){
        return $this->belongsTo(District::class)->first()->district;
    }
    public function sport(){
        return $this->belongsTo(Sport::class)->first()->sport;
    }
}
