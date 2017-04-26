<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $table = 'ad';
    protected $fillable = ['name', 'icon', 'remember_token','url','status'];
}
