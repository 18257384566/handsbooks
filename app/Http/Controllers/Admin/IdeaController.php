<?php

namespace App\Http\Controllers\Admin;

use App\Model\Idea;
use App\Model\Ideae;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IdeaController extends Controller
{
    public function show(Request $request)
    {
        if($request->isMethod('post')){

        }else{
            //修改查看状态
            if($_GET){
                //查询当前状态
                $id = $_GET['id'];
                $status = DB::table('ideaes')->select('status')->where('id',$id)->get();
                $sta = $status[0]->status == 1?0:1;
                $update = DB::table('ideaes')
                        ->where('id',$id)
                        ->update(['status'=>$sta]);
            }

            //查询数据库
            $result = DB::table('ideaes')->select('id' , 'status' , 'info')->paginate(3);
            return view('admin/idea')->with('result',$result);
        }
    }

    public function del($id)
    {
        //删除该记录
        DB::table('ideaes')->where('id',$id)->delete();
        return redirect('admin/idea');
    }

}
