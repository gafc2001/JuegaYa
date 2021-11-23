<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recomendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'comment_user_id',
        'comment',
        'rank'
    ];

    public function user(){
        return $this->belongsTo(User::class,'comment_user_id')->first();
    }
    public function getDate(){
        Carbon::setLocale('es');
        $now = Carbon::now();
        $time = Carbon::createFromDate($this->created_at);
        return $time->diffForHumans($now);
    }
    
}
