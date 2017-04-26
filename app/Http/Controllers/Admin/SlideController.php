<?php

namespace App\Http\Controllers\Admin;

use App\Model\Publish;
use App\Model\Slideshow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SlideController extends Controller
{
    public function show()
    {
        //查询数据
        $result = DB::table('slideshows')->paginate(5);
        return view('admin/slide')->with('result',$result);
    }

    //新增轮播图
    public function add(Request $request )
    {
        if($request->isMethod('post')){
            //条件判断
            $rules = array(
                'b_name' => 'required',
                'a_name' => 'required',
                'desc' => 'required|between:10,50',
                'icon' => 'required',
            );
            $mess = array(
                'b_name.required' => '请输入书名',
                'a_name.required' => '请输入作者名',
                'desc.required' => '请输入简介',
                'desc.between' => '请输入简介在10字 - 50字之间',
                'icon.required' => '请上传一张背景',
            );
            $validate = Validator::make($request -> all(), $rules, $mess);
            if($validate -> fails()){
                return  back() ->withErrors($validate);
            }else{
                $data = array(
                    'icon' => 'icon.jpg',
                );
                $result = Slideshow::create(array_merge($data,$request->all()));
                if($result){
                    //如果数据添加成功
                        //上传文件
                        $id = $result->id;
                        $request->file('icon')->move('slide_icon',"icon$id.jpg");

                        //更新数据库中的数据
                        $result = Slideshow::find($id);
                        $result ->icon = "icon$id.jpg";
                        $result ->save();
                    return redirect('/admin/slideshow');
                 }
            }
        }else{
            return view('admin/slide-add');
        }
    }

    //新增轮播图
    public function update(Request $request,$id)
    {
        if($request->isMethod('post')){
            //条件判断
            $rules = array(
                'b_name' => 'required',
                'a_name' => 'required',
                'desc' => 'required|between:10,50',
                'icon' => 'required',
            );
            $mess = array(
                'b_name.required' => '请输入书名',
                'a_name.required' => '请输入作者名',
                'desc.required' => '请输入简介',
                'desc.between' => '请输入简介在10字 - 50字之间',
                'icon.required' => '请上传一张背景',
            );
            $validate = Validator::make($request -> all(), $rules, $mess);
            if($validate -> fails()){
                return  back() ->withErrors($validate);
            }else{
                //修改数据
                $data = array(
                    'icon' => "icon$id.jpg",
                );

                $result = Slideshow::find($id);
                $result ->update(array_merge($request->all(),$data));

                     //如果数据添加成功
                      if($result){
                        //上传文件
                        $request->file('icon')->move('slide_icon',"icon$id.jpg");
                        }
                return redirect("/admin/slideshow");
            }
        }else{
            $result = DB::select("select `b_name`,`a_name`,`desc` from slideshows where id = $id");
            return view('admin/slideUpdate')->with('result',$result[0]);
        }
    }

    public function del($id)
    {
        Slideshow:: destroy([$id]);
        return redirect("/admin/slideshow");
    }


}
