<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course_taken extends Model
{
    protected $table='course_taken';
    protected $primaryKey = 'course_id';
    public $incrementing = false;
    public $timestamps = false;
}
