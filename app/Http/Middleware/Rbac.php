<?php

namespace App\Http\Middleware;

use App\Model\Admin;
use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Zizaco\Entrust\Entrust;
class Rbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //如果不存在a_id进入login
        if(!$request->session()->get('a_id')){
             return redirect('admin/login');
        }

//        $a_id = $request->session()->get('a_id');
//        $route = Route::current()->uri();
//        dump($route);

//        $admin = Admin::find($a_id);
//
//        if(!$admin->can($route)){
//        return back();
//    }

        return $next($request);
    }
}

//        $rew = DB::select("select p.id from admins as a, admin_role as ar, permissions as p, permission_role as pr, roles as r where r.id=pr.role_id and p.id = pr.permission_id and r.id = ar.role_id and a.id = ar.admin_id and p.name = $route and a.id = $a_id");
//dd($rew);

//public function handle($request, Closure $next)
//{
//    $id = session('res')->id;
//    $rew = role_user::select('permissions.*') //用户角色表和权限表
//    ->LeftJoin('permission_role', 'permission_role.role_id', 'role_user.role_id') //角色权限表role_id和用户角色role_id
//    ->LeftJoin('permissions', 'permissions.id', 'permission_role.permission_id') //权限表id和角色权限表premess_id
//    ->where('role_user.user_id', $id)
////            ->groupBy('permissions.name')
//        ->get()->toArray();
////dd($rew);
//    $pre = array('admin/index');
//    foreach ($rew as $v) {
//        $pre[] = $v['name'];
//    }
//    $current = Route::current()->uri(); //
//    if (!in_array($current, $pre)) {
//        //判断当前路由是否在指定路由里面
////            dd($current);
//        return back()->with('mess', '您没有访问权限');
//    }
//    return $next($request);
//}
