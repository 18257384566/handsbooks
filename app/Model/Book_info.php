<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book_info extends Model
{
    protected $table = 'books_info';
    protected $fillable = ['title', 'url', 'remember_token','books_id'];
}
