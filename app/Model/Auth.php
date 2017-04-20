<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected  $fillable  =  ['name', 'email','nameid','phone','focus','reader','detail','u_id'];
}
