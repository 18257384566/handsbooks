<?php

namespace App\Http\Controllers\Home;

use App\Model\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function show()
    {
        return view('home/auth');
    }

    public function add(Request $request)
    {

        if($request->isMethod('post')){
            $rules = array(
                'name' => 'required',
                'phone'=>'required|unique',
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
                $u_id = $request->session()->get('email');
                $request->file('nameid')->move('auth_icon','icon'.$u_id.'.jpg');
                $data = array(
                    'nameid' => 'icon'.$u_id.'.jpg',
                    'u_id' => $u_id
                );
                Auth::create(array_merge($request->all(),$data));
            }
        }else{
        }
        return view('home/authAdd');
    }

}
