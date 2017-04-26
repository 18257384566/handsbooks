<?php namespace App;

use Zizaco\Entrust\EntrustPermission;
//use Zizaco\Entrust\Traits\EntrustPermissionTrait;

class Permission extends EntrustPermission
{
//    use EntrustPermissionTrait;
    public $fillable = ['name', 'display_name', 'description'];
}