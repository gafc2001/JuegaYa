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
        'favorite_sport',
        'profile_picture',
        'gender',
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
}
