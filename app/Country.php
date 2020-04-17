<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model //Pays
{
    protected $table="countries"; //à changer once migration done
    
    public $timestamps=false;
}
