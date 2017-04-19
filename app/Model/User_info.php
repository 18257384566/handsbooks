<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    protected $table = 'users_info';
    protected $primaryKey = 'u_id';
    protected $fillable = ['name', 'sex','icon','u_id', 'remember_token'];

    protected $hidden = [
        'remember_token'
    ];
}
