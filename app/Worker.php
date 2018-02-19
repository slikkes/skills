<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    public function notes(){
        return $this->hasMany(Note::class);
    }


    public function points(){
        return $this->hasOne(Point::class);
    }
}
