<?php

namespace App\Http\Controllers\Home;

use App\Model\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
    public function show($id)
    {
        $book = Book::select('books.*','publishes.id','publishes.name')->join('publishes','books.pub_id','publishes.id')->find($id);
//        dd($book);
        return view('home/detail',compact('book'));
    }
}
