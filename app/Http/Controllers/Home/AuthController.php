<?php

namespace App\Http\Controllers\Home;

use App\Auth_user;
use App\Model\Auth;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function show()
    {
        $authors = DB::select('select a.id, a.detail, ui.icon,u.name from users as u, auths as a, users_info as ui where a.status =1 and a.u_id = u.id and u.id=ui.u_id and a.focus>10000 order by a.focus desc limit 4');
        $car = DB::select('select a.id, a.detail, ui.icon,u.name from users as u, auths as a, users_info as ui where a.status =1 and  a.u_id = u.id and u.id=ui.u_id and a.focus>10000 order by a.focus desc limit 20');
        return view('home/auth')->with('authors',$authors)->with('car',$car);
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
//                'phone.unique'=>'电话是唯一的',
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
        $u_id = $request->session()->get('u_id');

        $isset = DB::select("select user_id from auth_user where auth_id = {$id}");
        if(empty($isset)){
            $focus = DB::select("select `focus` from auths where id={$id}");
            $focus = $focus[0]->focus + '1';
//            dd($focus);
            DB::update("update auths set  focus = {$focus} where id = {$id}");

            $result = DB::insert('insert into auth_user (user_id,auth_id) value('.$u_id.','.$id.')');
            echo '关注成功';
        }else{
            echo '您已经关注了该作家';
        }

    }

}
