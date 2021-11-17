<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchGame extends Model
{
    protected $table = "matches";

    public function participants(){
        return $this->hasMany(Participant::class);
    }
    

}
