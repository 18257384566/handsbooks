<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Admin as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Admin extends Model
{
    protected $table = 'admins';

    public $timestamps = false;

    protected $fillable = ['name', 'password', 'remember_token'];

    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function setPasswordAttribute($value)
//    {
//           $this->attributes['password'] = Hash::make($value);
//    }

}
