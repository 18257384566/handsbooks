<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\AdminRegisterRequest;
use App\Model\User_info;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $rules = array(
            'name' => 'required|min:3',
        );
        $mess = array(
            'name.required' => '用户名不能为空',
            'name.min' => '用户名不能少于3位',
        );
        $this->validate($request,$rules,$mess);

        dd($request->all());
        $u_id = Auth::user()->id;
//        dd($u_id);
        $user = User::find($u_id);
//        dd($user);
        $user->name = $request->input('name','');
        $user->save();

        $user_info = User_info::find($u_id);
//        dd($user_info);
        $data = [
            'icon' => 'user_icon/user'.$u_id.'.jpg',
        ];
        if(!empty($request->file('icon'))){
            $request->file('icon')->move('user_icon',"user".$u_id.".jpg");
//            $user_info->icon = "user_icon/user$id.jpg";
        }
        $user_info->update(array_merge($request->all(),$data));
        return back();
    }

    /*编辑密码*/
    public function editPass(Request $request)
    {
        $result = Auth::attempt(['password' => $request->input('oldpwd')]);
        if($result){
            $rules = array(
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            );
            $mess = array(
                'password.required' => '密码不能为空',
                'password.confirmed' => '密码不一致',
                'password_confirmation.required' => '确认密码不能为空'
            );
            $this->validate($request,$rules,$mess);

            $id = Auth::user()->id;
            $user = User::find($id);
            $user->password = $request->input('password','');
            $result = $user->save();
            if($result){
                return redirect('home/login');
            }else{
                return back();
            }
        }else{
            return back()->with('mess','密码错误');
        }

    }

    /*解绑邮箱*/
    public function editEmail(Request $request)
    {
           return 111;

    }
}
