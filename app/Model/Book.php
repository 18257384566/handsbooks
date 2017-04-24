<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    public $timestamps = false;
    protected $fillable = ['title', 'icon','desc','price', 'remember_token','au_id','pub_id','c_id'];
}
