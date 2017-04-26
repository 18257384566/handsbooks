<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ideae extends Model
{
    protected $fillable = ['id', 'info','u_id','status'];
    public  $timestamps  =  false;
}
