<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PermissionsController extends Controller
{
    public function show()
    {
        //查询权限表的数据
        $result =DB::table('permissions')->groupBy('id')->paginate(5);
        return view('/admin/permissions')->with('result',$result);
    }

//    添加权限表单
    public function add(Request $request)
    {
        if($request->isMethod('post')){
            //数据验证
            $rules = array(
                'name' => 'required|unique:permissions,name',
                'display_name' => 'required',
                'description' => 'required',
            );
            $mess = array(
                'name.required' => '权限路由不能为空',
                'name.unique' => '权限路由必须唯一',
                'display_name.required' => '权限描述不能为空',
                'description.required' => '描述不能为空',
            );
            $validate = Validator::make($request ->all(),$rules,$mess);
//            var_dump($validate->errors());
            if($validate->fails()){
                return view('/admin/permissionsAdd')->withErrors($validate);
            }else{
                //添加权限
                $permission = Permission::create($request->all());
                return redirect('/admin/perm');
                exit;
            }
        }else{
            return view('admin/permissionsAdd');
        }
    }

    //删除
    public function del($permission_id)
    {
        DB::table('permissions')
            ->where('id',$permission_id)
            ->delete();
        return redirect('/admin/perm');
    }

    //修改
    public function update(Request $request,$permission_id)
    {
        if($request->isMethod('post')){
            //数据验证
            $rules = array(
                'name' => 'required',
                'display_name' => 'required',
                'description' => 'required',
            );
            $mess = array(
                'name.required' => '权限路由不能为空',
                'display_name.required' => '权限描述不能为空',
                'description.required' => '描述不能为空',
            );
            $validate = Validator::make($request ->all(),$rules,$mess);
//            dd($validate->errors());
            if($validate -> fails()){
                return  back() ->withErrors($validate);
            }else{
                //修改用户信息
                $permission = Permission::findOrFail($permission_id);
                $permission->update($request->all());
                return redirect('admin/perm');
            }
        }
        $permission = Permission::findOrFail($permission_id);
        return view('admin/permissionsUpdate')->with('permission',$permission);
    }


}
