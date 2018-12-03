<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasajero extends Model
{
    protected $table      = "pasajero";
    protected $primarykey = "id";
    protected $guarded    = array();

}