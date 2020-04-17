<?php

namespace App;
use App\Comment;

use Illuminate\Database\Eloquent\Model;

class Marche extends Model
{
    protected $table="marches";

    public $timestamps=true;

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function events(){
        return $this->hasMany(MarcheFlash::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function historiques(){
        return $this->hasMany(Historique::class);
    }
}
