<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table='student';
    protected $primaryKey = 'email_id';
    public $incrementing = false;
    public $timestamps = false;
}
