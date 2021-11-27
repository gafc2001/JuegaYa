<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    public static $signin = [
        'email' => ['required','email'],
        'password' => ['required'],
    ];
    public static $signup = [
        'email' => ['required','email','unique:users'],
        'password' => ['required'],
    ];
    public static $signup_msg = [
        'unique.users' => 'El correo ya existe'
    ] ;
    public static $signin_error = [
        'message' => 'Tu correo o contraseña son incorrectos'
    ];
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne(Profile::class)->first();
    }
    public function recomendations(){
        return $this->hasMany(Recomendation::class)->orderByDesc("created_at");
    }
    public function getProfilePicture(){
        if(!is_null($this->profile()) && !is_null($this->profile()->profile_picture)){
                return $this->profile()->profile_picture;
        }else{
            return "default-profile.png";
        }
    }
    
    public function participation($match_id){
        return $this->hasMany(Participant::class,'user_id')->get()->where('match_id',$match_id)->first();
    }
}
