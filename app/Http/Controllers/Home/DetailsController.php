<?php

namespace App\Http\Controllers\Home;

use App\Model\Book;
use App\Model\Book_info;
use App\Model\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DetailsController extends Controller
{
    public function show($id)
    {
//        dd($id);
        $book = Book::select('books.*','publishes.id','publishes.name')->join('publishes','books.pub_id','publishes.id')->find($id);
        $acString = file_get_contents($book->desc);
        $desc = unserialize($acString);
        $book_info  = Book_info::where('books_id',$id)->get();
//        dd($book_info);
        $comment=Comment::select('comment.*','users_info.icon','users_info.name')->join('users_info','users_info.u_id','comment.users_id')->where('books_id',$id)->where('comment.status',0)->orderBy('created_at','desc')->paginate(7);
//        dd($comment);
        $num = count($comment);
        $auth = DB::select("select a.`name` from auths as a , books as b where a.id = b.au_id and b.id = $id");
        $auth = $auth[0]->name;
        return view('home/detail',compact('book','desc','book_info','id','comment','num','auth'));
    }
}
