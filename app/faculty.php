<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faculty extends Model
{
    protected $table='faculty';
    protected $primaryKey = 'email_id';
    public $incrementing = false;
    public $timestamps = false;
}
