<?php

namespace App\Http\Controllers\Admin;

use App\Model\Book;
use App\Model\Book_info;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function show()
    {
        $result = Book::paginate(5);
        return view('admin/bookList',compact('result'));
    }
    public function add()
    {
        $data = DB::select('select name,id,concat(path,id,",") sort from category order by sort');
        return view('admin/bookadd',compact('data'));
    }
    public function doAdd(Request $request)
    {
        $last = DB::table('books')->select('*')->orderBy('id','desc')->limit(1)->get();
        $last_id = $last[0]->id;
        $id = $last_id + 1;
//        dd($id);
        $request->file('icon')->move('book_icon',"book$id.jpg");
        $data = [
            'au_id' => '1',
            'pub_id' => '1',
            'icon' => "book_icon/book$id.jpg"
        ];
        $result = Book::create(array_merge($request->all(),$data));
        if($result){
            return redirect('admin/book/list');
        }else{
            return back();
        }
    }

    public function edit($id)
    {
       $book = Book::find($id);
       return view('admin/bookEdit',compact('book'));
    }

    public function doEdit(Request $request,$id)
    {
        $book = Book::find($id);
        $book->title = $request->input('title','');
        $book->price = $request->input('price','');
        $book->desc = $request->input('desc','');
        $book->type = $request->input('type','');
        if(!empty($request->file('icon'))){
            $request->file('icon')->move('book_icon',"book$id.jpg");
            $book->icon = "book_icon/book$id.jpg";
        }
        $result = $book->save();
        if($result){
            return redirect('admin/book/list');
        }else{
            return back();
        }
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
