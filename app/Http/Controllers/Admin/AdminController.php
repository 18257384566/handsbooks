<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function show()
    {
        $result = DB::table('users')->get();
        return view('admin/admin')->with('result',$result);
    }

    //新增
    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $rules = array(
                'name' => 'required|min:3|unique:users,name',
                'email' => 'required',
                'password' => 'required',
//                'password_confirmation' => 'confirmed|required',
            );

            $mess = array(
                'name.required' => '用户名不能为空',
                'name.min' => '用户名至少是三位数',
                'name.unique' => '用户名是唯一的',
                'email.required' => '邮箱不能为空',
//                'email.exists' => '该邮箱不存在',
                'password.required' => '密码不能为空',
                'password_confirmation' => '确认密码不能为空',
//                'password_confirmation' => '两次密码不相同',
            );
            $validate = Validator::make($request ->all(),$rules,$mess);
//            dd($validate->errors());
            if($validate->fails()){
                return redirect('/admin/admin-add')->withErrors($validate);
            }else{
                User::create($request->all());
                return redirect('/admin/admin');
            }
        }
        return view('admin/adminAdd');
    }

    //修改
    public function update(Request $request,$id)
    {
        if($request->isMethod('post')){
            $rules = array(
                'name' => 'required|min:3',
                'email' => 'required',
                'password' => 'required',
//                'password_confirmation' => 'confirmed|required',
            );

            $mess = array(
                'name.required' => '用户名不能为空',
                'name.min' => '用户名至少是三位数',
                'email.required' => '邮箱不能为空',
//                'email.exists' => '该邮箱不存在',
                'password.required' => '密码不能为空',
                'password_confirmation' => '确认密码不能为空',
//                'password_confirmation' => '两次密码不相同',
            );
            $validate = Validator::make($request ->all(),$rules,$mess);
//            dd($validate->errors());
            if($validate->fails()){
                dd('d1111');
                return redirect('/admin/admin-add')->withErrors($validate);
            }else{
                $result = User::findOrFail($id);

            }
//            dd('222');
            $result = DB::table('users')
                ->where('id',$id)
                ->get();
            return view('admin/adminUpdate')->with('result',$result);
        }
        $result = DB::table('users')
            ->where('id',$id)
            ->get();
        return view('admin/adminUpdate')->with('result',$result);
    }
}
