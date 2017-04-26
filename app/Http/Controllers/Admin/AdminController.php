<?php

namespace App\Http\Controllers\Admin;


use App\Model\Admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function show(Request $request)
    {

        $result = Admin::all();
        foreach ($result as $user) {
            $roles = array();
            foreach ($user->roles as $role) {
                $roles[] = $role->display_name;
            }
            $user->roles= implode(',', $roles);
        }
//        dd($result);
//        exit;
        return view('/admin/admin')->with('result',$result);
        exit;

        //查询角色

        $admins = DB::select('select `id`,`name`,`icon`,`email` from admins');

        foreach ($admins as $admin) {
            //查询用户id
            $id = $admin->id;
            //查询该用户的角色
            $roles = [];
            $role = DB::select('select r.name from role_user as ur , roles as r where ur.user_id = ' . $id);

//            dump($admin);
//            dump($role);

            foreach ($role as $k) {
                $roles[] = $k->name;
                //将查询出的数据转成数组
                $admin = json_encode($admin);
                $admin = json_decode($admin,true);
                //在数组中添加对应角色
                $role = implode(',', $roles);
//                dump($role);
                dump('=========');
                $arr = ['role'=>$role];
                global $arr;
            }
            dump($arr);
//            $new = array_merge($arr,$admin);
//            dump($admins);
        }



        //查询admin
//        $result = DB::select('select a.id,a.name,a.email, r.name from admins as a , roles as r, role_user as ru where a.id=ru.user_id and r.id=ru.role_id');
            $result = DB::table('admins')->get();
            return view('admin/admin')->with('result', $admins);
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
            if($validate->fails()){
                return redirect('/admin/admin-add')->withErrors($validate);
            }else{
                $result = Admin::create($request->all());
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
            );

            $mess = array(
                'name.required' => '用户名不能为空',
                'name.min' => '用户名至少是三位数',
                'email.required' => '邮箱不能为空',
//                'email.exists' => '该邮箱不存在',
                'password.required' => '密码不能为空',
            );
            $validate = Validator::make($request ->all(),$rules,$mess);
            if($validate->fails()){
                return redirect('/admin/admin-add')->withErrors($validate);
            }else{
                $result = Admin::findOrFail($id);
            }
            //判断是否上传图像
            if(!empty($request->file('icon'))){
                //上传到指定文件
                $request->file('icon')->move('aicon','icon'.$id.'.jpg');
                $data = array(
                    'icon' => 'icon'.$id.'.jpg',
                );
                //删除原来的图片
                $oldIcon = Admin::find($id);
                Storage::delete($oldIcon);
//                dd($oldIcon->icon);

                //存储数据
                $admin = Admin::findOrFail($id);
                $admin->update(array_merge($request->all(),$data));
                return redirect('/admin/admin');
            }else{
                //存储数据
                $admin = Admin::findOrFail($id);
                $admin->update($request->all());
                return redirect('admin/admin');
            }

        }
        $result = DB::table('admins')
            ->where('id',$id)
            ->get();
        return view('admin/adminUpdate')->with('result',$result);
    }

    //删除
    public function del(Request $request,$id){
        //删除该id用户的头像
//        $oldIcon = Admin::find($id)->icon;
//          //判断是否为默认头像
//        dump($oldIcon);
//             if($oldIcon != 'aicon.jpg'){
//                 Storage::delete($oldIcon);
//                 }

        //删除该用户的记录
        $del = Admin::findOrFail($id);
        $del ->delete();
        return redirect('admin/admin');
    }

    //为该用户分配角色
    public function cast(Request $request,$id)
    {
        if($request->isMethod('post')){
            //删除当前用户的所有角色
            DB::table('admin_role')->where('admin_id',$id)->delete();
            //为用户分配角色
            foreach ($request->input('role_id') as $k){
                //将两张表的id存入对应的表
                //$k -> 角色   $id -> 用户
                DB::insert('insert into `admin_role` (`admin_id`,`role_id`) value('.$id.' , '.$k.')');
            }
            return redirect('/admin/admin');
        }else{
            $role = DB::table('roles')->get();
            return view('admin/AdminCast')->with('role',$role);
        }
    }
}
