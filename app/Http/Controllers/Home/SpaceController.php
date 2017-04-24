<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\AdminRegisterRequest;
use App\Model\Book;
use App\Model\Order;
use App\Model\User_info;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SpaceController extends Controller
{
    /*显示页面*/
    public function show()
    {
        if(Auth::check()){
            $id = Auth::user()->id;
            $user = User::join('users_info','users.id','users_info.u_id')->find($id);
//            dd($user);
            return view('home/space',compact('user'));
        }else{
            return view('home/index');
        }

    }

    /*编辑基本信息*/
    public function doEdit(Request $request)
    {
//        return $_FILES('icon');
        if(empty($request->name)){
            echo  1;
            exit;
        }else{
            $u_id = Auth::user()->id;
//        dd($u_id);
            $user = User::find($u_id);
//        dd($user);
            $user->name = $request->input('name','');
            $user->save();
//
            $user_info = User_info::find($u_id);
//        dd($user_info);

            $user_info->update($request->all());

            echo 2;
        }


    }

    /*编辑密码*/
    public function editPass(Request $request)
    {
//        echo $request->input('email');
        if(empty($request->password)){
            echo 1;
            exit;
        }
        if(empty($request->newpassword)){
            echo 2;
            exit;
        }
        if(empty($request->newpassword_confirmation)){
            echo 3;
            exit;
        }

        $result = Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password')]);
        if($result){
//            echo 111;
            if($request->input('newpassword') == $request->input('newpassword_confirmation')){
                    $id = Auth::user()->id;
                    $user = User::find($id);
                    $user->password = $request->input('newpassword','');
                    $result = $user->save();
                    if($result){
                        Auth::logout();
//    //                return redirect('home/login');
//                        /*成功*/
                        echo 4;
                        exit;
                    }else{
//                        /*失败*/
                        echo 5;
                        exit;
                    }
            }else{
//                /*密码不一致*/
                echo 7;
                exit;
            }
//
        }else{
//            /*密码错误*/
            echo 6;
            exit;
        }

    }

    /*解绑邮箱*/
    public function editEmail(Request $request)
    {
          if(empty($request->email)){
              return 3;
              exit;
          }
//        echo $request->email;
          $result = User::where('email',$request->email)->get();
//          dd($result[0]->email);
          if(empty($result[0])){
              $confirmed_code = str_random(10);
              $id = Auth::user()->id;
              $user = User::find($id);
              $user->email = $request->email;
              $user->confirmed_code = $confirmed_code;
              $data = array(
                  'confirmed_code' => $confirmed_code,
              );
              $user->is_confirmed = 0;
              $result = $user->save();

              /*发送邮件*/
              $view = 'home.emailConfirmed';
              $subject = '请验证邮箱';
              $this->sendEmail($user,$view, $subject, $data);

              Auth::logout();

              return  1;
              exit;

          }else{
              return  2;
              exit;
          }
    }

    public function sendEmail($user,$view,$subject,$data)
    {
        Mail::send($view,$data,function($m) use ($subject,$user){
            $m->to($user->email)->subject($subject);
        });
    }

    public function emailConfirm($code)
    {
//        dd($code);
        /*查询与之匹配的这个用户*/
        $user = User::where('confirmed_code',$code)->first();
//        dd($user);
        if(is_null($user)){
            return redirect('/home/index');
        }
        $user->confirmed_code = str_random(10);
        $user->is_confirmed = 1;
        $user->save();
        return redirect('/home/login');
    }

    public function editIcon(Request $request)
    {
//      dd($request->file('icon'));
        $id = Auth::user()->id;
//        dd($id);
        $user_info = User_info::find($id);
//        dd($user);
        $user_info->icon = 'user_icon/user'.$id.'.jpg';
        $user_info->save();
        $request->file('icon')->move('user_icon',"user".$id.".jpg");
        $user = User::join('users_info','users.id','users_info.u_id')->find($id);

        return view('home/space',compact('user'));
    }

    /*显示书籍列表*/

    public function book()
    {
        $id = Auth::user()->id;
        $order = Order::select('books.*')->join('books','books.id','orders.books_id')->where('orders.users_id',$id)->where('orders.isPay',1)->where('cancel',0)->paginate(7);
//        dd($order);
        $user = User::join('users_info','users.id','users_info.u_id')->find($id);
        $collect = DB::table('users_books')->select('books_id')->where('users_id',$id)->get();
//        dump($collect);
        $book = array();
        foreach($collect as $k=>$v){
            $book[] = Book::find($v->books_id);
        }
//        dd($book);
        return view('home/book',compact('order','user','book'));
    }

    public function no_collect($books_id)
    {
        $users_id = Auth::user()->id;
        $result = DB::table('users_books')->where('users_id',$users_id)->where('books_id',$books_id)->delete();
        if($result){
            return redirect('/home/space/book');
        }else{
            return back();
        }

    }



}
