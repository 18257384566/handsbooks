<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\AdminRegisterRequest;
use App\Model\Book;
use App\Model\Book_info;
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
    public function show(Request $request)
    {
        if(Auth::check()){
            $id = Auth::user()->id;
            $user = User::join('users_info','users.id','users_info.u_id')->find($id);
//            dd($user);

            //如果该用户是作者，则显示作者的前台管理
            $u_id = $request->session()->get('u_id');
            $result = DB::select("select id from auths where u_id = {$u_id} and status = 1");
            if($result){
                $a_id = $result[0]->id;
            }else{
                $a_id = '';
            }

            return view('home/space',compact('user','a_id'));
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

        //如果该用户是作者，则显示作者的前台管理
        $u_id = $request->session()->get('u_id');
        $result = DB::select("select id from auths where u_id = {$u_id} and status = 1");
        if($result){
            $a_id = $result[0]->id;
        }else{
            $a_id = '';
        }

        return view('home/space',compact('user','a_id'));
    }

    /*显示书籍列表*/

    public function book(Request $request)
    {
        $id = Auth::user()->id;
        $order = Order::select('books.*')->join('books','books.id','orders.books_id')->where('orders.users_id',$id)->where('orders.isPay',1)->where('cancel',0)->paginate(7);
//        dump($order);
        $user = User::join('users_info','users.id','users_info.u_id')->find($id);
        $collect = DB::table('users_books')->select('books_id')->where('users_id',$id)->get();
//        dump($collect);
        $book = array();
        foreach($collect as $k=>$v){
            $book[] = Book::find($v->books_id);
        }



        //如果该用户是作者，则显示作者的前台管理
        $u_id = $request->session()->get('u_id');
        $result = DB::select("select id from auths where u_id = {$u_id} and status = 1");
        if($result){
            $a_id = $result[0]->id;
        }else{
            $a_id = '';
        }
        return view('home/book',compact('order','user','book','a_id'));
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

    public function read_record($b_id)
    {
        $users_id = Auth::user()->id;
        $res = DB::table('read_record')->where('books_id',$b_id)->where('users_id',$users_id)->get();
        if(empty($res[0])){
            $book_info = Book_info::where('books_id',$b_id)->orderBy('id')->get();
            $data = [
                'users_id'=>$users_id,
                'books_id'=>$b_id,
                'info_id'=>$book_info[0]->id,
            ];
            DB::table('read_record')->insert($data);
//            dd($book_info);
            return redirect('/home/space/book/article_space/'.$b_id.'/'.$book_info[0]->id);
        }else{
            $info_id = $res[0]->info_id;
            return redirect('/home/space/book/article_space/'.$b_id.'/'.$info_id);
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

        return view('/home/article_space',compact('article','title','b_id'));
    }

    public function prev($b_id)
    {
        $users_id = Auth::user()->id;
        $res = DB::table('read_record')->where('books_id',$b_id)->where('users_id',$users_id)->get();
        $info_id = $res[0]->info_id;
        $book = Book_info::select('id')->where('books_id',$b_id)->orderBy('id')->get();
//        dump($num);
//        dump($book);
        $key = '';
        foreach($book as $k => $v) {
            if ($v->id == $info_id) {
                $key = $k;
//                dump($key);
            }

            }
//        dd($key);
        foreach($book as $k => $v){
            if($key == 0){
                $prev = 0;
            }else{
                /*上一页*/
                if ($k == $key - 1) {
                    $prev = $v->id;
                }
            }

        }
        if($prev){
            if($info_id == $book[1]->id){
                DB::table('read_record')->where('books_id',$b_id)->where('users_id',$users_id)->update(['info_id'=>$prev]);
                return redirect('/home/space/book/article_space/'.$b_id.'/'.$prev)->with('mess',1);
            }else{
                DB::table('read_record')->where('books_id',$b_id)->where('users_id',$users_id)->update(['info_id'=>$prev]);
                return redirect('/home/space/book/article_space/'.$b_id.'/'.$prev);
            }

        }else{
            return redirect('/home/space/book/article_space/'.$b_id.'/'.$info_id)->with('mess',1);
        }
    }

    public function next($b_id)
    {
        $users_id = Auth::user()->id;
        $res = DB::table('read_record')->where('books_id',$b_id)->where('users_id',$users_id)->get();
        $info_id = $res[0]->info_id;
        $book = Book_info::select('id')->where('books_id',$b_id)->orderBy('id')->get();
        $num = count($book)-1;
//        dump($num);
//        dump($book);
        $key = '';
        foreach($book as $k => $v) {
            if ($v->id == $info_id) {
                $key = $k;
//                dump($key);
            }
        }

        foreach($book as $k => $v){
            if($key == $num){
                $next = 0;
            }else{
                /*下一页*/
                if ($k == $key + 1) {
//                    dump($key+1);
                    $next = $v->id;
                }
            }
        }
//        dd($book[$num]->id);
        if($next){
            if($info_id == $book[$num-1]->id){
                DB::table('read_record')->where('books_id',$b_id)->where('users_id',$users_id)->update(['info_id'=>$next]);
                return redirect('/home/space/book/article_space/'.$b_id.'/'.$next)->with('message',1);
            }else{
                DB::table('read_record')->where('books_id',$b_id)->where('users_id',$users_id)->update(['info_id'=>$next]);
                return redirect('/home/space/book/article_space/'.$b_id.'/'.$next);
            }

        }else{
            return redirect('/home/space/book/article_space/'.$b_id.'/'.$info_id)->with('message',1);
        }
    }
}
