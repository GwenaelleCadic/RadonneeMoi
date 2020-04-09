<?php

namespace App;
use App\User;
use App\Marche;

use Illuminate\Database\Eloquent\Model;

class MarcheFlash extends Model
{
    protected $table="marcheflashs";
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function marche(){
        return $this->belongsTo(Marche::class);
    }
}
