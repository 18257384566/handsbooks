<?php

namespace App\Http\Controllers\Admin;

use App\Model\Book;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Yaml\Tests\B;

class CategoryController extends Controller
{
    /*显示顶级分类表单*/
    public function show(Request $request)
    {
        if($request->search){
            $result = Category::where('pid','0')->where('name','like','%'.$request->search.'%')->paginate(5);
            $search = [
                'search'=>$request->search,
            ];
            return view('admin/categoryList',compact('result'))->with('search',$search);
        }else{
            $result = Category::where('pid','0')->paginate(5);
            return view('admin/categoryList',compact('result'));
        }

    }

    /*添加顶级分类*/
    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $rules = array(
                'name' => 'required',
            );
            $mess = array(
                'name.required' => '分类名不能为空'
            );
            $this->validate($request,$rules,$mess);
            Category::create($request->all());
            return redirect('admin/category/list')->with('message','添加成功');
        }else{
            return view('admin/categoryAdd');
        }
    }

    /*编辑顶级分类*/
    public function edit(Request $request,$id)
    {
        if($request->isMethod('post')){
                $rules = array(
                    'name' => 'required',
                );
                $mess = array(
                    'name.required' => '分类名不能为空'
                );
                $this->validate($request,$rules,$mess);
            $category = Category::find($id);
            $category->name = $request->input('name','');
            $category->pid = $request->input('pid','');
            $category->path = $request->input('path','');
            $category->display = $request->input('display','');
            $category->save();

            $res = Category::select('display')->find($id);
            $display = $res->display;
            if($display == 2){
                $category = Category::select('id')->where('pid',$id)->get();
                foreach($category as $k => $v){
                    $book = Book::where('c_id',$v->id)->update(['up'=>1]);
                }
            }else{
                $category = Category::select('id')->where('pid',$id)->get();
                foreach($category as $k => $v){
                    $book = Book::where('c_id',$v->id)->update(['up'=>0]);
                }
            }
            $pid =$request->input('pid');
            return redirect('admin/category/showSon/'.$pid)->with('message','编辑成功');
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
        return view('admin/category/list')->with('message','删除成功');
    }
    /*添加子分类*/
    public function addSon(Request $request,$id)
    {
        /*判断传输方式*/
        if($request->isMethod('post')){
            /*是post就添加子分类*/
//            dd($request->all());
            $result = Category::where('id',$id)->pluck('path');
            $path = $result[0];
            $data = [
                'pid' => $id,
                'path' => $path.$id.',',
            ];
            Category::create(array_merge($request->all(),$data));
            return redirect('admin/category/list')->with('message','添加成功');
        }else{
            /*是get就显示添加表单*/
            return view('admin/categoryAddSon');
        }
    }

    /*显示子分类表单*/
    public function showSon(Request $request,$id)
    {
        if($request->search){
            $result = Category::where('pid',$id)->where('name','like','%'.$request->search.'%')->paginate(5);
//        dd($result);
            $search = [
                'search'=>$request->search,
            ];
            return view('admin/categoryListSon' ,compact('result','id'))->with('search',$search);
        }else{
            $result = Category::where('pid',$id)->paginate(5);
//        dd($result);
            return view('admin/categoryListSon' ,compact('result','id'));
        }

    }

    /*编辑分类*/
    public function editSon()
    {

    }
}
