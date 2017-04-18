<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
    protected $fillable = ['name','icon','detail','good','read'];
    protected  $guarded  =  ['_token'];
}
