<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'password','niveau','region_id','groupe','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $primaryKey = 'id';
    public $incrementing = false;
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    public function events(){
        return $this->hasMany(MarcheFlash::class);
    }

    public function marches(){
        return $this->hasMany(Marche::class);
    }

    public function historiques(){
        return $this->hasMany(Historique::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }
}
