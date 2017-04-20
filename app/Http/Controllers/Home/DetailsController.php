<?php

namespace App\Http\Controllers\Home;

use App\Model\Book;
use App\Model\Book_info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
    public function show($id)
    {
        $book = Book::select('books.*','publishes.id','publishes.name')->join('publishes','books.pub_id','publishes.id')->find($id);
        $acString = file_get_contents($book->desc);
        $desc = unserialize($acString);
        $book_info  = Book_info::where('books_id',$id)->get();
//        dd($book_info);
        return view('home/detail',compact('book','desc','book_info'));
    }
}
