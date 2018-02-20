<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $primaryKey = 'worker_id';
    public $incrementing=false;
    public $timestamps=false;

}
