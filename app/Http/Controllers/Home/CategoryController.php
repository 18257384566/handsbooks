<?php

namespace App\Http\Controllers\Home;

use App\Model\Book;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function show($id = 0)
    {
        if($id == 0){
//            $book = Book::where('up',0)->paginate(20);
            $book = DB::table('books')->join('auths','books.au_id','auths.id')->where('up',0)->paginate(20);
        }else{
            $book = Book::where('c_id',$id)->where('up','0')->paginate(20);
//            $book = DB::table('books')->join('auths','books.au_id','auths.id')->whereColumn([
//                ['books.up','=', 'b.0'],
//                ['books.c_id',  'books.$id']
//            ])->paginate(20);
        }
        $category = Category::all();

        return view('home.category',compact('category','book'));
    }

    public function showList()
    {

    }
}
