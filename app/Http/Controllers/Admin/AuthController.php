<?php

namespace App\Http\Controllers\Admin;

use App\Model\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function show(Request $request){
        $result = DB::select('select a.id ,a.nameid, b.email, a.name, a.phone, a.focus, a.detail, a.status from users as b, auths as a where b.email = a.u_id ');
//        dd($result);
        return view('/admin/auth')->with('result',$result);
    }

    public function status()
    {
        $id = $_GET['id'];
        $status = $_GET['status']=='禁用'?'1':'0';
        //修改作者的状态
        $result = DB::table('auths')
            ->where('id',$id)
            ->update([
                'status' => $status
            ]);
    }

    //修改信息
    public function update(Request $request,$id)
    {
        if($request->isMethod('post')){
            $rules = array(
                'name'=>'required',
                'focus'=>'required|integer',
                'reader'=>'required|integer',
            );
            $mess = array(
                'name.required'=>'请填写姓名',
                'focus.required'=>'请填写关注',
                'focus.integer'=>'数量必须为整型',
                'reader.required'=>'请填写访问量',
                'reader.integer'=>'访问量必须为整型',
            );
            $validate = Validator::make($request -> all(), $rules, $mess);
            if($validate -> fails()){
                return  back() ->withErrors($validate);
            }else{
                $up = Auth::find($id);
                $up ->update($request->all());
                return redirect('admin/auth');
            }
        }else{
            $result = DB::table('auths')->select('name','phone','focus','reader')->get();
            return view('admin/authUpdate')->with('result',$result);
        }
    }

    //删除作者
    public function del(Request $request,$id)
    {
        //删除作者的图片
//        Storage::delete();
        Auth::destroy([$id]);
        return view('/admin/auth');
    }
}
