<?php

namespace App\Http\Controllers\Home;

use App\Model\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
    public function show($id)
    {
        $book = Book::find($id);
        return view('home/detail',compact('book'));
    }
}
