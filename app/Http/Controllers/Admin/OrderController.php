<?php

namespace App\Http\Controllers\Admin;

use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function show()
    {
        $order = Order::join('users_info','orders.users_id','users_info.u_id')->orderBy('orders.id')->paginate(5);
        $books =  Order::join('books','orders.books_id','books.id')->orderBy('orders.id')->paginate(5);
        $time = Order::select('created_at','id')->orderBy('orders.id')->paginate(5);
//        dd($time);
//        dump($books);
//        dd($order);
        return view('admin/orderList',compact('order','books','time'));
    }

    public function changeStatus($id)
    {
        $order = Order::find($id);
        $order->cancel = 1;
        $result = $order->save();
        if($result){
            return redirect('/admin/order/list');
        }else{
            return back();
        }
    }

    public function changePay($id)
    {
        $order = Order::find($id);
        $order->isPay = 1;
        $result = $order->save();
        if($result){
            return redirect('/admin/order/list');
        }else{
            return back();
        }
    }
}
