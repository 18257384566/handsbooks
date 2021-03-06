<?php

namespace App\Http\Controllers\Home;

use App\Model\Comment;
use App\Model\Order;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Model\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /*订单号*/
    public function c_uuid($prefix = "") //可以指定前缀
    {
        $str = md5(uniqid(mt_rand(), true));
        $uuid  = substr($str,0,8)  ;
        $uuid .= substr($str,8,4)  ;
        $uuid .= substr($str,12,4) ;
        $uuid .= substr($str,16,4) ;
        return $prefix . $uuid;
    }

    public function add(Request $request)
    {
        $ord_num = $this->c_uuid();
//        echo $ord_num;
        $data = [
            'users_id' => Auth::user()->id,
            'ord_num' => $ord_num,

        ];

        $result = Order::create(array_merge($request->all(),$data));
        $ids = $result->id;
//        echo $ids;
        if($result){
            echo $ids;
            exit;
        }else{
            echo 0;
            exit;
        }

    }


    public function orders(Request $request,$num)
    {
        $users_id = Auth::user()->id;
//        dd($users_id);
        if($num == 1){
            $order = Order::join('books','orders.books_id','books.id')->where('users_id',$users_id)->orderBy('orders.id')->paginate(5);
            $time = Order::select('created_at','id','isPay')->where('users_id',$users_id)->orderBy('orders.id')->paginate(5);
        }elseif ($num == 2){
            $order = Order::join('books','orders.books_id','books.id')->where('users_id',$users_id)->where('isPay',0)->where('cancel',0)->orderBy('orders.id')->paginate(5);
            $time = Order::select('created_at','id','isPay')->where('users_id',$users_id)->where('isPay',0)->where('cancel',0)->orderBy('orders.id')->paginate(5);
        }elseif ($num == 3){
            $order = Order::join('books','orders.books_id','books.id')->where('users_id',$users_id)->where('cancel',1)->orderBy('orders.id')->paginate(5);
            $time = Order::select('created_at','id','isPay')->where('users_id',$users_id)->where('cancel',1)->orderBy('orders.id')->paginate(5);
        }else{
            $order = Order::join('books','orders.books_id','books.id')->where('users_id',$users_id)->where('isPay',1)->where('cancel',0)->orderBy('orders.id')->paginate(5);
            $time = Order::select('created_at','id','isPay')->where('users_id',$users_id)->where('isPay',1)->where('cancel',0)->orderBy('orders.id')->paginate(5);
        }
        //如果该用户是作者，则显示作者的前台管理
        $u_id = $request->session()->get('u_id');
        $result = DB::select("select id from auths where u_id = {$u_id} and status = 1");
        if($result){
            $a_id = $result[0]->id;
        }else{
            $a_id = '';
        }
        $user = User::join('users_info','users.id','users_info.u_id')->find($users_id);

        return view('home/orders',compact('order','time','user','num','a_id'));

    }

    public function isPay(Request $request)
    {
        $id = $request->id;
        $order = Order::find($id);
        $order->isPay = 1;
        $result = $order->save();
        if($result){
            echo 1;
            exit;
        }else{
            echo 2;
            exit;
        }
    }

    public function toPay($id)
    {
        $order = Order::find($id);
//        dd($order);
        $order->isPay = 1;
        $result = $order->save();
        if($result){
            return redirect('/home/space/order/2');
        }else{
            return back();
        }
    }

    public function isCancel($id)
    {
        $order = Order::find($id);
//        dd($order);
        $order->cancel= 1;
        $result = $order->save();
        if($result){
            return redirect('/home/space/order/2');
        }else{
            return back();
        }
    }

    public function comment(Request $request)
    {
        $users_id = Auth::user()->id;
//        echo $users_id;
        $orders_id = $request->orders_id;
        $comment = $request->comment;
        $result= Order::select('books_id')->where('ord_num',$orders_id)->get();
        $books_id = $result[0]->books_id;
//        echo $books_id;

        $data = [
             'users_id' => $users_id,
            'books_id' => $books_id,
            'ord_num' => $orders_id,
            'comment' => $comment
        ];
//        echo $data;
        Comment::create($data);

        $results = Order::select('id')->where('ord_num',$orders_id)->get();
        $o_id = $results[0]->id;
        $orders = Order::find($o_id);
        $orders->is_comment = 1;
        $res = $orders->save();
        if($res){
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }

    }
}
