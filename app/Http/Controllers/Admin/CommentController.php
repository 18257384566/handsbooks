<?php

namespace App\Http\Controllers\Admin;

use App\Model\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function show(){
        $comment = Comment::select('comment.*','users_info.name')->join('users_info','users_info.u_id','comment.users_id')->orderBy('comment.id','desc')->paginate(5);
//        dd($comment);
        $book = Comment::select('comment.*','books.title')->join('books','books.id','comment.books_id')->orderBy('comment.id','desc')->paginate(5);
//        dd($book);
        return view('/admin/comment',compact('comment','book'));
    }

    public function changeStatus($id)
    {
        $comment = Comment::find($id);
        $comment->status = 1;
        $result = $comment->save();
        if($result){
            return redirect('/admin/comment/list');
        }else{
            return back();
        }
    }
}
