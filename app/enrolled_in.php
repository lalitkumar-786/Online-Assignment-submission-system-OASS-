<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class enrolled_in extends Model
{
    protected $table='enrolled_in';
    //protected $primaryKey = 'email_id';
    public $incrementing = false;
    public $timestamps = false;
}
