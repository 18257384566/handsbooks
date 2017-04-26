<?php

namespace App\Http\Controllers\Home;

use App\Model\Book;
use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BillboardController extends Controller
{
    public function show()
    {
        $book = Book::select('books.*','auths.name')->join('auths','auths.id','books.au_id')->orderBy('id')->get();
        return view('home/Billboard',compact('book'));
    }

    public function hot()
    {
        $res = Order::select(DB::Raw('books_id,count(books_id) as num'))->groupBy('books_id')->orderBy('num','desc')->paginate(12);
//        $res = DB::select("select books_id,count('books_id') as num from orders group by books_id order by num desc")->paginate(12);
        $top_list = array();
        foreach($res as $k => $v){
            $top_list[] = Book::select('books.*','auths.name')->join('auths','auths.id','books.au_id')->find($v->books_id);
        }


        return view('home/Billboard',compact('top_list'));
    }

    public function newBook()
    {
        $top_list = Book::select('books.*','auths.name')->join('auths','auths.id','books.au_id')->orderBy('created_at','desc')->limit(12)->get();
        return view('home/Billboard',compact('top_list'));
    }
}
