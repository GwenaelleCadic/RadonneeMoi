<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table="regions";
    
    public $timestamps=false;

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
    
    public function marches(){
        return $this->hasMany(Marche::class);
    }
}
