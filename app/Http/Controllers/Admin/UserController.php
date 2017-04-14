<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function show()
    {
        $result = User::paginate(5);
//        dd($result);
        return view('admin/userList',compact('result'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.userEdit',compact('user'));
    }
    public function doEdit(Request $request,$id)
    {
        $rules = array(
            'name' => 'required',
            'age' => 'required',
            'grade' => 'required'
        );
        $mess = array(
            'name.required' => '用户名不能为空',
            'age.required' => '年龄不能为空',
            'grade.required' => '班期不能为空'
        );
        $this->validate($request,$rules,$mess);
       $user = User::find($id);
       $user->name = $request->input('name','');
       $user->age = $request->input('age','');
       $user->grade = $request->input('grade','');
       $result = $user->save();
       if($result){
           return redirect('admin/user/list');
       }else{
           return back();
       }
    }
    public function add()
    {
        return view('admin/useradd');
    }
    public function doAdd(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'age' => 'required',
            'grade' => 'required'
        );
        $mess = array(
            'name.required' => '用户名不能为空',
            'age.required' => '年龄不能为空',
            'grade.required' => '班期不能为空'
        );
        $this->validate($request,$rules,$mess);

        $user = new User();
        $user->name = $request->input('name','');
        $user->age = $request->input('age','');
        $user->grade = $request->input('grade','');
        $result = $user->save();
        if($result){
            return redirect('admin/user/list');
        }else{
            return back();
        }
    }
    public function del($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/list');
    }
}
