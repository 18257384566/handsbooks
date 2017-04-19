<?php

namespace App\Http\Controllers\Admin;

use App\Model\Book;
use App\Model\Book_info;
use App\Model\Category;
use App\Model\Publish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function show()
    {
        $result = DB::table('books')->select('books.id','c_id','pid','title','icon','price','desc','name','pub_id')->join('category','books.c_id','category.id')->paginate(5);
        return view('admin/bookList',compact('result'));
    }
    public function add()
    {
        $publish = Publish::all();
        $data = DB::select('select * from category');
        $boss = array();
        $son = array();
        foreach($data as $k => $v){
             if($v->path == '0,'){
                 $boss[$v->id] = $v->name;
             }
        }
//        var_dump($boss);
        foreach($boss as $key=>$value){
            foreach($data as $k => $v){
                if($v->pid == $key){
                    $son[$key][$v->id] = $v->name;
                }
            }
        }
//        dd($son);
        return view('admin/bookadd',compact('boss','son','publish'));
    }
    public function doAdd(Request $request)
    {
//        dd($request->all());
        $last = DB::table('books')->select('*')->orderBy('id','desc')->limit(1)->get();
        $last_id = $last[0]->id;
        $id = $last_id + 1;
//        dd($id);
        $data = [
            'au_id' => '1',
            'pub_id' => '1',
            'icon' => "book_icon/book$id.jpg"
        ];
        $result = Book::create(array_merge($request->all(),$data));
        if($result){
            $request->file('icon')->move('book_icon',"book$id.jpg");
            return redirect('admin/book/list');
        }else{
            return back();
        }
    }

    public function edit($id)
    {
//        dd($id);
        $data = Book::select('pub_id')->where('id',$id)->get();
        $pub_id = $data[0]->pub_id;
        $publish = Publish::all();
        $data = Book::select('c_id')->where('id',$id)->get();
        $c_id = $data[0]->c_id;
        $cate = Category::select('name','pid','id')->where('id',$c_id)->get();
//        dd($cate);
        $book = Book::find($id);

       return view('admin/bookEdit',compact('book','cate','publish','pub_id'));
    }

    public function doEdit(Request $request,$id)
    {
//        dd($request->all());
//        $aa = Category::select('id')->where('name',$request->c_id)->get();
//        dd($aa);
        $book = Book::find($id);
        $book->title = $request->input('title','');
        $book->price = $request->input('price','');
        $book->desc = $request->input('desc','');
        $book->c_id = $request->input('c_id','');
        if(!empty($request->file('icon'))){
//            dd(11);
            $request->file('icon')->move('book_icon',"book$id.jpg");
            $book->icon = "book_icon/book$id.jpg";
        }
//        dd(22);
        $result = $book->save();
        if($result){
            return redirect('admin/book/list');
        }else{
            return back();
        }
    }

    public function cate()
    {
//        $data = Book::select('c_id')->where('id',$id)->get();
//        $c_id = $data[0]->c_id;
//        $cate = Category::select('name','pid','id')->where('id',$c_id)->get();
//        echo $cate;
        $data = Category::all();
        return $data;
    }

    public function cateBoss()
    {
        var_dump($_GET['id']);
//        $data = Book::select('c_id')->where('id',$id)->get();
//        $c_id = $data[0]->c_id;
//        $cate = Category::select('name','pid','id')->where('id',$c_id)->get();
//        echo $cate;
    }

    public function del($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('admin/book/list');
    }

    public function detailShow($id)
    {
        $b_id=$id;
        $book = Book_info::where('books_id',$b_id)->get();
        return view('admin/bookDetail',compact('b_id','book'));
    }

    public function detailAdd($b_id)
    {
//        dd($b_id);
        return view('admin/bookDetailAdd',compact('b_id'));
    }

    public function detailDoAdd(Request $request,$b_id)
    {
        $last = DB::table('books_info')->select('*')->orderBy('id','desc')->limit(1)->get();
        $last_id = $last[0]->id;
        $id = $last_id + 1;
        $request->file('url')->move('book_content',"book".$b_id."_".$id.".txt");
        $data = [
            'url' => "book_content/book".$b_id."_".$id.".txt",
            'books_id' => $b_id,
        ];
        $result = Book_info::create(array_merge($request->all(),$data));
        if($result){
            return redirect('admin/book/detail'.'/'.$b_id);
        }else{
            return back();
        }
    }
}
