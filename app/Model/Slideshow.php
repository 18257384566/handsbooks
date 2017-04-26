<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    protected $fillable = ['a_name','icon','b_name','desc'];
    public $timestamps = false;
}
