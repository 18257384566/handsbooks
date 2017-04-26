<?php

namespace App\Http\Controllers\Admin;

use App\Model\User_info;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function show(Request $request)
    {
        if($request->search){
            $result = User::leftjoin('users_info','users.id','users_info.u_id')->where('users.name','like','%'.$request->search.'%')->paginate(5);
            $search = [
                'search' => $request->search,
            ];
            return view('admin/userList',compact('result'))->with('search',$search);
        }else{
            $result = User::leftjoin('users_info','users.id','users_info.u_id')->paginate(5);
            return view('admin/userList',compact('result'));
        }

    }
    public function edit($id)
    {
        $user = User::leftjoin('users_info','users.id','users_info.u_id')->find($id);
//        dd($user);
        return view('admin.userEdit',compact('user'));
    }
    public function doEdit(Request $request,$id)
    {
//        dd($request->sex);
        $rules = array(
            'name' => 'required',
        );
        $mess = array(
            'name.required' => '用户名不能为空',
        );
        $this->validate($request,$rules,$mess);
        $user = User::find($id);
        $user->name = $request->input('name','');
        $result = $user->save();

//        $info_id = User_info::
        $user_info = User_info::find($id);
        $user_info->sex = $request->input('sex','');
//        $user_info->icon = $request->input('icon','');
        if(!empty($request->file('icon'))){
            $request->file('icon')->move('user_icon',"user$id.jpg");
            $user_info->icon = "user_icon/user$id.jpg";
        }
        $user_info->save();
       if($result){
           return redirect('admin/user/list')->with('message','编辑成功');
       }else{
           return back();
       }
    }
    public function add()
    {
        return view('admin/userAdd');
    }
    public function doAdd(Request $request)
    {
//        dd($request->all());
        $rules = array(
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        );
        $mess = array(
            'name.required' => '用户名不能为空',
            'name.min' => '用户名不能少于3位',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式错误',
            'password.required' => '密码不能为空',
            'password.confirmed' => '密码不一致',
            'password_confirmation.required' => '确认密码不能为空'
        );
        $this->validate($request,$rules,$mess);

        $confirmed_code = str_random(10);
        $data = array(
            'confirmed_code' => $confirmed_code,
        );

        $user = User::create(array_merge($request->all(),$data));
        /*发送邮件*/
        $view = 'home.emailConfirmed';
        $subject = '请验证邮箱';
        $this->sendEmail($user,$view, $subject, $data);

        $email = $request->input('email');
        $name = $request->input('name');
        $result= User::where('email',$email)->pluck('id')->toArray();
        $u_id = $result[0];
        $arr = array(
            'name' => $name,
            'icon' => 'home/img/icon.jpg',
            'u_id' => $u_id
        );
        $res = DB::table('users_info')->insert($arr);

        if($res){
            return redirect('admin/user/list')->with('message','添加成功');
        }else{
            return back();
        }
    }

    public function sendEmail($user,$view,$subject,$data)
    {

        Mail::send($view,$data,function($m) use ($subject,$user){
            $m->to($user->email)->subject($subject);
        });
    }


    /*删除*/
    public function del($id)
    {
        $user = User::find($id);
        $user->delete();
        DB::table('users_info')->where('u_id',$id)->delete();
        unlink("user_icon/user".$id.".jpg");
        return redirect('admin/user/list')->with('message','删除成功');
    }

    /*禁用*/
    public function no($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $result = $user->save();
        if($result){
            return redirect('/admin/user/list')->with('message', '禁用成功');
        }else{
            return back();
        }
    }

    /*激活*/
    public function yes($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $result = $user->save();
        if($result){
            return redirect('/admin/user/list')->with('message', '激活成功');
        }else{
            return back();
        }
    }

    public function isAuthor($id)
    {
        $user = User::find($id);
        $user->is_author = 1;
        $result = $user->save();
        if($result){
            return redirect('/admin/user/list');
        }else{
            return back();
        }
    }
}
