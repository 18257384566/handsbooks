<?php

namespace App\Http\Controllers\Admin;

use App\Model\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdController extends Controller
{
    public function show(Request $request)
    {
        if($request->search){
            $ad = Ad::where('name','like','%'.$request->search.'%')->orderBy('created_at','desc')->paginate(5);
            $search = [
                'search' => $request->search,
            ];
            return view('admin/adList',compact('ad'))->with('search',$search);
        }else{
            $ad = Ad::orderBy('created_at','desc')->paginate(5);;
            return view('admin/adList',compact('ad'));
        }

    }

    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $rules = array(
                'name' => 'required',
                'url' => 'required',
                'icon' => 'required',
            );
            $mess = array(
                'name.required' => '名字不能为空',
                'url.required' => '路径不能为空',
                'icon.required' => '图片不能为空',
            );
            $this->validate($request,$rules,$mess);
            $res = Ad::create($request->all());
            $ids = $res->id;
            if($res){
                $data = Ad::find($ids);
                $data->icon = "ad_icon/ad$ids.jpg";
                $data->save();
                $request->file('icon')->move('ad_icon',"ad$ids.jpg");
                return redirect('admin/ad/list')->with('message','添加成功');
            }else{
                return back();
            }
        }else{
            return view('admin/adAdd');
        }
    }

    public function edit(Request $request,$id)
    {
        if($request->isMethod('post')){
            $rules = array(
                'name' => 'required',
                'url' => 'required',
            );
            $mess = array(
                'name.required' => '名字不能为空',
                'url.required' => '路径不能为空',
            );
            $this->validate($request,$rules,$mess);
            $ad = Ad::find($id);
            $ad-> name = $request->input('name','');
            $ad-> url = $request->input('url','');
            if(!empty($request->file('icon'))){
//            dd(11);
                $request->file('icon')->move('ad_icon',"ad$id.jpg");
                $ad->icon = "ad_icon/ad$id.jpg";
            }
            $result = $ad->save();
            if($result){
                return redirect('admin/ad/list')->with('message','编辑成功');
            }else{
                return back();
            }
        }else{
            $ad = Ad::find($id);
            return view('admin/adEdit',compact('ad'));
        }
    }

    public function del($id)
    {
        $ad = Ad::find($id);
        $ad->delete();
        unlink("ad_icon/ad".$id.".jpg");

        return redirect('admin/ad/list')->with('message','删除成功');
    }


    /*禁用*/
    public function down($id)
    {
        $ad = Ad::find($id);
        $ad->status = 0;
        $result = $ad->save();
        if($result){
            return redirect('/admin/ad/list')->with('message', '禁用成功');
        }else{
            return back();
        }
    }

    /*激活*/
    public function up($id)
    {
        $res = Ad::find($id);
        $res->status = 1;
        $result = $res->save();
        if($result){
            return redirect('/admin/ad/list')->with('message', '激活成功');
        }else{
            return back();
        }
    }
}
