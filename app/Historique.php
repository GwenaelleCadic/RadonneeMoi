<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    protected $table="historiques";

    public $timestamps=false;
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function marche(){
        return $this->belongsTo(Marche::class);
    }

}
