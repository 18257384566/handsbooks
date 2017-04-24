<?php

namespace App\Http\Controllers\Home;

use App\Auth_user;
use App\Model\Auth;
use App\Model\Book;
use App\Model\Book_info;
use App\Model\Publish;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function show(Request  $request)
    {
        //检查是否存在u_id
        if($request->session()->get('u_id')){
            $u_id = $request->session()->get('u_id');
        }else{
            $u_id = '';
        }

        $authors = DB::select('select a.id, a.detail, ui.icon,u.name from users as u, auths as a, users_info as ui where a.status =1 and a.u_id = u.id and u.id=ui.u_id and a.focus>10000 order by a.focus desc limit 4');
        $car = DB::select('select a.id, a.detail, ui.icon,u.name from users as u, auths as a, users_info as ui where a.status =1 and  a.u_id = u.id and u.id=ui.u_id and a.focus>10000 order by a.focus desc limit 20');

        return view('home/auth')->with('authors',$authors)->with('car',$car)->with('u_id',$u_id);
    }

    public function add(Request $request)
    {

        if($request->isMethod('post')){
            $rules = array(
                'name' => 'required',
                'phone'=>'required',
            );
            $mess = array(
                'name.required'=>'真实姓名不能为空',
                'phone.required'=>'电话不能为空',
         'phone.unique'=>'电话是唯一的',

//                'nameid.required'=>'请上传身份证正面照片'
            );
            $validate = Validator::make($request -> all(), $rules, $mess);
            if($validate -> fails() ){
                return  back() ->withErrors($validate);
            }else{
                //上传到指定文件
                $u_id = $request->session()->get('u_id');
                $request->file('nameid')->move('auth_icon','icon'.$u_id.'.jpg');
                $data = array(
                    'nameid' => 'icon'.$u_id.'.jpg',
                    'u_id' => $u_id
                );
                Auth::create(array_merge($request->all(),$data));
                DB::table('users')
                    ->where('id',$u_id)
                    ->update([
                        'is_author' => 1,
                ]);
                return redirect('home/index');
            }
        }else{
        }
        $u_id =  $request->session()->get('u_id');
        //查询users表中的是否为作者
        $is_auth = DB::table('users')->select('is_author')->where('id',$u_id)->get();
//          $is_auth = DB::select("select is_author where id = {$u_id}");
        $is_author = $is_auth[0]->is_author;
        if($is_author == 0){
            return view('home/authAdd');
        }else{
//            dd('3333');
            $status = DB::table('auths')->select('status')->where('u_id',$u_id)->get();
//            dd($status);
            $status = json_decode($status);
            return view('home/authAdd2')->with('status',$status[0]->status);
//        return view('home/authAdd');
        }
    }

    //作者详情
    public function info(Request $request,$id)
    {
        $info = DB::select('select a.id, a.detail, a.focus, ui.icon,u.name from users as u, auths as a, users_info as ui where a.u_id = u.id and u.id=ui.u_id and a.id = '.$id);
        $books = DB::select('select `title`,`price`,`icon` from books where au_id = '.$id);
        $count = DB::table('books')->select('id')->where('au_id',$id)->count();
        return view('home/authInfo')->with('info',$info)->with('books',$books)->with('count',$count);
    }

    //关注
    public function focus(Request $request)
    {
        $id = $_GET['id'];

        if(!empty($request->session()->get('u_id'))){
            $u_id = $request->session()->get('u_id');

            $isset = DB::select("select user_id from auth_user where auth_id = {$id}");

            if(empty($isset)){
                $focus = DB::select("select `focus` from auths where id={$id}");
                $focus = $focus[0]->focus + '1';
                DB::update("update auths set  focus = {$focus} where id = {$id}");

                $result = DB::insert('insert into auth_user (user_id,auth_id) value('.$u_id.','.$id.')');

                echo '关注成功';
            }

            if($isset[0]->user_id != $u_id){
                $focus = DB::select("select `focus` from auths where id={$id}");
                $focus = $focus[0]->focus + '1';
                DB::update("update auths set  focus = {$focus} where id = {$id}");

                $result = DB::insert('insert into auth_user (user_id,auth_id) value('.$u_id.','.$id.')');

                echo '关注成功';
            }else{
                echo '您已经关注了该作家';
            }
        }
    }

    // 个人中心 - 作者
    public function space(Request  $request,$a_id){
        if($request->isMethod('post')){
           //存入数据库
           $data = array(
               'icon' => 'book.jpg',
               'au_id' => $a_id,
               //默认为百度的机构
               'pub_id' => '3',
           );
           $result = Book::create(array_merge($request->all(),$data));

           //如果数据添加成功
                //获取新增id
                $id = $result ->id;
                //上传封面
                $request->file('icon')->move('book_icon',"book$id.jpg");
                //串行化描述
                $descString = serialize($request->input('desc'));
                file_put_contents('book_desc/book'.$id.'.txt', $descString);

                //将新数据更新至数据库
                $data = Book::find($id);
                $data->icon = "book_icon/book$id.jpg";
                $data->desc = "book_desc/book$id.txt";
                $data->save();
                return back();
       }else{
           //用户
           $u_id = $request->session()->get('u_id');
           $users = DB::table('users')->join('users_info','users.id','users_info.u_id')->where('users.id',$u_id)->get();

           //作者
           $auth = DB::table('auths')->join('books','books.au_id','auths.id')->where('auths.id',$a_id)->get();
//           dump($auth);
           //机构
            $publish = Publish::all();

           return view('home/authSpace')->with('users',$users[0])->with('auth',$auth)->with('publish',$publish);
       }
    }

    //创作
    public function write(Request $request,$id)
    {
        dump($id);
        if($request->isMethod('post')){
            $rules = array(
                'title' => 'required',
                'url' => 'required',
            );
            $mess = array(
                'title.required' => '章节名不能为空',
                'url.required' => '您还未填写内容',
            );
            $validate = Validator::make($request ->all(),$rules,$mess);

            if($validate->fails()){
                return  view('home/write')->withErrors($validate);
            }else{
                $data = array(
                    'books_id' => $id,
                    'url' => 'url',
                );
                $result = Book_info::create(array_merge($request->all(),$data));
                if($result){
                    $binfo_id = $result->id;

                    //串行化，将章节存入
                    $urlString = serialize($request->input('url'));
                    file_put_contents("book_content/book".$binfo_id."_".$id.".txt", $urlString);

                    //更改数据库里的名字
                    $data = Book_info::find($binfo_id);
                    $data->url = "book".$binfo_id."_".$id.".txt";
                    $data->save();

                    return redirect("home/space");

                }
            }

        }else{
            return view('home/write');
        }
    }








}
