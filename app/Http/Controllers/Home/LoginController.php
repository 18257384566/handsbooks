<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*显示登陆表单*/
    public function show()
    {
        return view('home/login');
    }

    /*执行登陆*/
    public function doLogin(UserLoginRequest $request)
    {
       $result = Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password'),'is_confirmed' => 1,'status'=>0]);

       if (!$result) {
          return redirect('home/login')->with('mess', '邮箱或密码错误');
       }else{
           //将登陆者邮箱存入session
           $email = $request->input('email');
           $result = DB::table('users')->select('id')->where('email',$email)->get();
           $id = $result[0]->id;
           $request->session()->put('u_id',$id);
           return redirect('home/index');
       }

    }

    /*用户注销*/
    public function logout(Request $request)
    {
        Auth::logout();
        //注销登陆时，清楚登陆者的session
        $request->session()->forget('u_id');
        return redirect('home/index');
    }

}
