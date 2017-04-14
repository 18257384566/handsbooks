<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    public function show(Request $request)
    {
        $roles = Role::all();
        foreach ($roles as $role) {
            $perms = array();
            foreach ($role->perms as $perm) {
                $perms[] = $perm->display_name;
            }
            $role->perms= implode(',', $perms);
        }
//        dd($roles);
        return view('admin.roles', compact('roles'));
    }

    //增加角色
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            //数据验证
            $rules = array(
                'name' => 'required|unique:permissions,name',
                'display_name' => 'required',
                'description' => 'required',
            );
            $mess = array(
                'name.required' => '角色名称不能为空',
                'name.unique' => '角色名须唯一',
                'display_name.required' => '角色描述不能为空',
                'description.required' => '描述不能为空',
            );
            $validate = Validator::make($request->all(), $rules, $mess);

            if ($validate->fails()) {
                return view('/admin/rolesAdd')->withErrors($validate);
            } else {
                //添加角色
                $role = Role::create($request->all());
//                //查询角色表的数据
//                $result = DB::table('roles')->get();
                return redirect('admin/roles');
                exit;
            }
        }
        return view('admin/rolesAdd');
    }

    //修改角色
    public function update(Request $request,$role_id)
    {
        if($request->isMethod('post')){
            //数据验证
            $rules = array(
                'name' => 'required',
                'display_name' => 'required',
                'description' => 'required',
            );
            $mess = array(
                'name.required' => '角色名称不能为空',
                'display_name.required' => '角色描述不能为空',
                'description.required' => '描述不能为空',
            );

            $validate = Validator::make($request->all(), $rules, $mess);

            if ($validate->fails()) {
                return view('admin/rolesUpdate')->withErrors($validate);
            } else {
                //修改角色
                $role = Role::findOrFail($role_id);
                $role ->update($request->all());
                return redirect('admin/roles');
                exit;
            }
        }else {
            $role = Role::findOrFail($role_id);
            return view('admin/rolesUpdate')->with('role',$role);
        }
    }

    //删除
    public function del(Request $request,$role_id)
    {
        $role = DB::table('roles')->where('id',$role_id)->delete();
        return redirect('admin/roles');
    }

    //权限分配
    public function deal(Request $request,$role_id)
    {
        if($request->isMethod('post')){
            //获取当前用户的角色
            $role = Role::find($role_id);
            //先将所有的权限删除
            DB::table('permission_role')->where('role_id', $role_id)->delete();
            //重新分配权限
            foreach ($request->input('permission_id') as $permission_id){
                $role->attachPermission(Permission::find($permission_id));
            }
            return redirect('admin/roles');
        }else{

            $perm = DB::table('permissions')->get();
            return view('admin/rolesDeal')->with('perm',$perm);
        }
    }
}
