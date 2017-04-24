<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['ord_num', 'books_id','users_id','price', 'remember_token','isPay','cancel','orderWay'];
}
