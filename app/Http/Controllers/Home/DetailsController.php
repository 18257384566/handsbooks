<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\Auth;
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
        $users_id = Auth::user()->id;
        $book = Book::select('books.*','publishes.id','publishes.name')->join('publishes','books.pub_id','publishes.id')->find($id);
        $acString = file_get_contents($book->desc);
        $desc = unserialize($acString);
        $book_info  = Book_info::where('books_id',$id)->get();
//        dd($book_info);
        $comment=Comment::select('comment.*','users_info.icon','users_info.name')->join('users_info','users_info.u_id','comment.users_id')->where('books_id',$id)->where('comment.status',0)->orderBy('created_at','desc')->paginate(7);
//        dd($comment);
        $num = count($comment);
        $result = DB::table('users_books')->where('users_id',$users_id)->where('books_id',$id)->get();
//        dump($result);
        if(empty($result[0])){
            $collect=0;
        }else{
            $collect=1;
        }
        return view('home/detail',compact('book','desc','book_info','id','comment','num','collect'));
    }

    public function collect_ok($id)
    {
        $users_id = Auth::user()->id;
        $data = [
            'users_id'=>$users_id,
            'books_id'=>$id
        ];

        $result = DB::table('users_books')->insert($data);
        if($result){
            return redirect('/home/detail/'.$id);
        }else{
            return back();
        }
    }

    public function collect_no($id)
    {
        $users_id = Auth::user()->id;
        $result = DB::table('users_books')->where('users_id',$users_id)->where('books_id',$id)->delete();
        if($result){
            return redirect('/home/detail/'.$id);
        }else{
            return back();
        }
    }
}
