<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Admin extends Model
{
    use EntrustUserTrait;
    protected  $fillable  =  ['name', 'email', 'icon','password'];

}
