<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'match_id',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class)->first();
    }
    public function match(){
        return $this->belongsTo(MatchGame::class)->first();
    }
}
