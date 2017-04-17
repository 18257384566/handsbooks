<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected  $fillable  =  ['name', 'email', 'icon','password'];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
}
