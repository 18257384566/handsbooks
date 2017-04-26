<?php

namespace App\Http\Controllers\Admin;

use App\Model\Publish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PublishController extends Controller
{
    public function show()
    {
        //搜索分页
        $result = DB::table('publishes')->paginate(5);
        return view('/admin/publish')->with('result',$result);
    }

    //增加
    public function add(Request $request)
    {
        if($request->isMethod('post')){
            //数据验证
            $rules=array(
                'name' => 'required',
                'detail' => 'required',
            );
            $mess=array(
                'name.required'=>'请写入机构名称',
                'detail.required'=>'请输入对机构的描述',
            );
            $validate = Validator::make($request ->all(),$rules,$mess);
            if($validate->fails()) {
                //验证不通过
                return back()->withErrors($validate);
            }else{
                //在publishs表中插入数据
                $add = Publish::create($request->all());
                return redirect('admin/publish');
            }

        }else{
            return view('/admin/PublishAdd');
        }
    }

    //删除
    public function del(Request $request,$id){
        Publish::destroy([$id]);
        return redirect('/admin/publish');
    }

    //修改
    public function update(Request $request,$id)
    {
        if($request->isMethod('post')){
            //数据验证
            $rules=array(
                'name' => 'required',
                'detail' => 'required',
                'icon' => 'required',
                'good' => 'numeric|required|min:0|integer',
                'read' => 'numeric|required|min:0|integer',
            );
            $mess=array(
                'name.required'=>'请写入机构名称',
                'detail.required'=>'请输入对机构的描述',
                'icon.required'=>'头像不能为空',
                'good.numeric'=>'点赞数量书写格式不正确',
                'good.required'=>'点赞数量不能空',
                'good.integer'=>'点赞数量必须为整数',
                'good.min'=>'点赞数量最小值为0',
                'read.numeric'=>'阅读数量书写格式不正确',
                'read.required'=>'阅读数量不能为空',
                'read.min'=>'阅读数量最小为0',
                'read.integer'=>'阅读数量必须为整数',
            );
            $validate = Validator::make($request ->all(),$rules,$mess);
            if($validate->fails()) {
                //验证不通过
                return back()->withErrors($validate);
            }else{
                //存储logo
                    //判断是否上传图像
                    if(!empty($request->file('icon'))) {
                        //删除原来的图片
                        $oldIcon = Publish::find($id);
                        Storage::delete($oldIcon);
                        //上传到指定文件
                        $request->file('icon')->move('picon', 'icon' . $id . '.jpg');
                        $data = array(
                            'icon' => 'icon' . $id . '.jpg'
                        );
                        $update = Publish::find($id);
                        $update->update(array_merge($request->all(),$data));
                        return redirect('/admin/publish');
                    }
                //修改数据$admin->update(array_merge($request->all(),$data));
                $update = Publish::find($id);
                $update->update($request->all());
                return redirect('/admin/publish');
            }
        }
        $result = Publish::all()->where('id',$id);
        return view('admin/publishUpdate')->with('result',$result);
    }
}
