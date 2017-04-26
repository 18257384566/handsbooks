<?php

namespace App\Http\Controllers\Home;

use App\Model\Auth;
use App\Model\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function show()
    {

        /*热销榜*/
        $res = DB::select("select books_id,count('books_id') as num from orders group by books_id order by num desc limit 4");
        $top_list = array();
        foreach($res as $k => $v){
            $top_list[] = Book::join('auths','books.au_id','auths.id')->find($v->books_id);
        }

        /*新书*/
        $new = Book::orderBy('created_at','desc')->limit(12)->get();
        $result = DB::select("select au_id,count('au_id') as num from books group by au_id order by num desc limit 4");

        /*人气作者*/
        $auth = array();
        $book = array();
        foreach($result as $k => $v){
            $auth[] = Auth::select('users_info.icon','auths.name','auths.id')->join('users_info','users_info.u_id','auths.u_id')->find($v->au_id);
            $book[$v->au_id] = Book::select('title')->where('au_id',$v->au_id)->limit(3)->get();
        }

        //轮播图
        $result = DB::table('slideshows')->get();
        return view('home.index',compact('top_list','new','auth','book'))->with('result',$result);




    }
}
