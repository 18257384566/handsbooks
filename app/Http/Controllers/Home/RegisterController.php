<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\UserRegisterRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*显示注册页面*/
    public function show()
    {
        return view('home/register');
    }

    /*执行注册操作*/
    public function doReg(UserRegisterRequest $request)
    {
        $confirmed_code = str_random(10);
        $data = array(
            'confirmed_code' => $confirmed_code,
        );
       $user =  User::create(array_merge($request->all(), $data));
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
           'icon' => '/home/img/icon.jpg',
           'u_id' => $u_id
       );
       DB::table('users_info')->insert($arr);
//       dd($re);
       return redirect('home/index');

    }

    public function sendEmail($user,$view,$subject,$data)
    {
        Mail::send($view,$data,function($m) use ($subject,$user){
              $m->to($user->email)->subject($subject);
        });
    }

    public function emailConfirm($code)
    {
//        dd($code);
        /*查询与之匹配的这个用户*/
        $user = User::where('confirmed_code',$code)->first();
//        dd($user);
        if(is_null($user)){
            return redirect('/home/index');
        }
        $user->confirmed_code = str_random(10);
        $user->is_confirmed = 1;
        $user->save();
        return redirect('/home/login');
    }
}
