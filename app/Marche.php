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
}
