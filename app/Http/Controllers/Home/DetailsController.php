<?php

namespace App\Http\Controllers\Home;

use App\Model\Order;
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
        /*用户id*/
        $users_id = Auth::user()->id;

        /*是否购买*/
        $order = Order::where('users_id',$users_id)->where('books_id',$id)->where('isPay',1)->where('cancel',0)->count('*');

        /*书籍和出版社信息*/
        $book = Book::select('books.*','publishes.id','publishes.name')->join('publishes','books.pub_id','publishes.id')->find($id);

        /*作者信息*/
        $auth = Book::select('auths.name')->join('auths','auths.id','books.au_id')->find($id);

        /*反串行化提取书籍描述*/
        $acString = file_get_contents($book->desc);
        $desc = unserialize($acString);

        /*获取章节信息*/
        $book_info  = Book_info::where('books_id',$id)->orderBy('id')->get();
//        $first = $book_info[0]->id;
        $number = count($book_info);

        /*获取评论信息*/
        $comment=Comment::select('comment.*','users_info.icon','users_info.name')->join('users_info','users_info.u_id','comment.users_id')->where('books_id',$id)->where('comment.status',0)->orderBy('created_at','desc')->paginate(7);
        /*计算条数*/
        $num = count($comment);

        /*查询用户是否收藏此书籍*/
        $result = DB::table('users_books')->where('users_id',$users_id)->where('books_id',$id)->get();
        if(empty($result[0])){
            $collect=0;
        }else{
            $collect=1;
        }


        $res = DB::select("select books_id,count('books_id') as num from orders group by books_id order by num desc limit 10");
//       dump($res);
        $top_list = array();
        foreach($res as $k => $v){
            $top_list[] = Book::find($v->books_id);
        }

//        dd($top_list);
        return view('home/detail',compact('book','desc','book_info','number','id','comment','num','collect','order','top_list','auth'));

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

   public function article($b_id,$t_id)
   {
       $url = "book_content/book".$b_id."_".$t_id.".txt";
       $acString = file_get_contents($url);
       $article = unserialize($acString);

       $result = Book_info::select('title')->find($t_id);
       $title = $result->title;

       $book = Book_info::select('id')->where('books_id',$b_id)->orderBy('id')->get();

       $key = '';
       foreach($book as $k => $v){
           if($v->id == $t_id){
               $key = $k;
//               dd($key-1);
           }

       }

       foreach($book as $k => $v){
           /*上一页*/
           if($k == $key-1){
               $prev = $v->id;
           }
           /*下一页*/
           if($k == $key+1){
               $next = $v->id;
           }
       }

       return view('/home/article',compact('article','title','b_id','prev','next'));
   }
}
