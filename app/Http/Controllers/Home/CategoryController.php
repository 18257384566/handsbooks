<?php

namespace App\Http\Controllers\Home;

use App\Model\Book;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show($id = 0)
    {
        if($id == 0){
            $book = Book::paginate(20);
        }else{
            $book = Book::where('c_id',$id)->paginate(20);
        }
        $category = Category::all();

        return view('home.category',compact('category','book'));
    }

    public function showList()
    {

    }
}
