<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /*显示顶级分类表单*/
    public function show()
    {
        $result = Category::where('pid','0')->paginate(5);
        return view('admin/categoryList',compact('result'));
    }

    /*添加顶级分类*/
    public function add(Request $request)
    {
        if($request->isMethod('post')){
            Category::create($request->all());
            return redirect('admin/category/list');
        }else{
            return view('admin/categoryAdd');
        }
    }

    /*编辑顶级分类*/
    public function edit(Request $request,$id)
    {
        if($request->isMethod('post')){
            $category = Category::find($id);
            $category->name = $request->input('name','');
            $category->pid = $request->input('pid','');
            $category->path = $request->input('path','');
            $category->display = $request->input('display','');
            $category->save();
            return back();
        }else{
            $category = Category::find($id);
            return view('admin/categoryEdit',compact('category'));
        }
    }

    /*删除分类*/
    public function del($id)
    {
        $category = Category::find($id);
        $category->delete();
        $data = DB::table('category')->where('pid',$id)->pluck('id')->toArray();
        Category::destroy($data);
        return back();
    }
    /*添加子分类*/
    public function addSon(Request $request,$id)
    {
        /*判断传输方式*/
        if($request->isMethod('post')){
            /*是post就添加子分类*/
            $result = Category::where('id',$id)->pluck('path');
            $path = $result[0];
            $data = [
                'pid' => $id,
                'path' => $path.$id.',',
            ];
            Category::create(array_merge($request->all(),$data));
            return redirect('admin/category/list');
        }else{
            /*是get就显示添加表单*/
            return view('admin/categoryAddSon');
        }
    }

    /*显示子分类表单*/
    public function showSon($id)
    {
        $result = Category::where('pid',$id)->paginate(5);
//        dd($result);
        return view('admin/categoryListSon' ,compact('result'));
    }

    /*编辑分类*/
    public function editSon()
    {

    }
}
