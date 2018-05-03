<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teaches extends Model
{
    protected $table='teaches';
    protected $primaryKey = 'course_id';
    public $incrementing = false;
    public $timestamps = false;
}
