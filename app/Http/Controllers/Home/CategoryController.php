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

            $book = Book::where('up',0)->paginate(12);
        }else{
            $book = Book::where('c_id',$id)->where('up','0')->paginate(12);
//            dd($book);

        }
        $category = Category::where('display',1)->get();
//       if(empty($book[0])){
//           dd(11);
//       }else{
//           dd(22);
//       }
        return view('home.category',compact('category','book','id'));
    }

    public function showList()
    {

    }
}
