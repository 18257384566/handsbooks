<?php

namespace App\Http\Controllers\Admin;

use App\Model\Auth;
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
    /*显示书籍列表*/
    public function show()
    {
        $result = DB::table('books')->select('books.id','au_id','c_id','pid','title','icon','price','desc','name','pub_id')->join('category','books.c_id','category.id')->paginate(5);
        return view('admin/bookList',compact('result'));
    }
    /*跳转添加页面*/
    public function add()
    {
        $publish = Publish::all();
        $author = Auth::all();
        return view('admin/bookadd',compact('publish','author'));
    }

   /*添加书籍*/
    public function doAdd(Request $request)
    {
//        dd($request->all());
        $rules = array(
            'title' => 'required',
            'price' => 'required',
            'desc' => 'required',
            'icon' => 'required',
        );
        $mess = array(
            'title.required' => '书名不能为空',
            'price.required' => '价格不能为空',
            'desc.required' => '描述不能为空',
            'icon.required' => '图片不能为空',
        );
        $this->validate($request,$rules,$mess);
        /*添加数据*/
        $data = [
            'icon' => "book_icon/book.jpg",
            'desc' => "book_desc/book.txt",
        ];
        $result = Book::create(array_merge($request->all(),$data));
        $ids = $result->id;

        if($result){
            /*如果数据添加成功*/
            /*将书籍描述串行化存储*/
            $data = Book::find($ids);
            $data->icon = "book_icon/book$ids.jpg";
            $data->desc = "book_desc/book$ids.txt";
            $data->save();

            $desc = $request->input('desc');
            $descString = serialize($desc);
            file_put_contents('book_desc/book'.$ids.'.txt', $descString);
            $request->file('icon')->move('book_icon',"book$ids.jpg");
            return redirect('admin/book/list');
        }else{
            /*数据添加失败则返回*/
            return back();
        }
    }

    /*跳转编辑页面*/
    public function edit($id)
    {
//        dd($id);
        /*获取出版社id*/
        $data = Book::select('pub_id','au_id')->where('id',$id)->get();
        $pub_id = $data[0]->pub_id;
        $au_id = $data[0]->au_id;
        /*查询出版社信息*/
        $publish = Publish::all();

       /*查询作者信息*/
        $author = Auth::all();

        /*获取分类id*/
        $data = Book::select('c_id')->where('id',$id)->get();
        $c_id = $data[0]->c_id;
        /*查询分类信息*/
        $cate = Category::select('name','pid','id')->where('id',$c_id)->get();
//        dd($cate);

        /*查询书籍信息*/
        $book = Book::find($id);

        /*反串行化读取书籍描述*/
        $name = $book->desc;
        $acString = file_get_contents($name);
        $desc = unserialize($acString);
       return view('admin/bookEdit',compact('book','cate','publish','pub_id','desc','au_id','author'));
    }

    /*执行编辑*/
    public function doEdit(Request $request,$id)
    {
//        dd($request->all());
        $rules = array(
            'title' => 'required',
            'price' => 'required',
            'desc' => 'required',
        );
        $mess = array(
            'title.required' => '书名不能为空',
            'price.required' => '价格不能为空',
            'desc.required' => '描述不能为空',
        );
        $this->validate($request,$rules,$mess);
        /*获取*/
        $book = Book::find($id);
        $book->title = $request->input('title','');
        $book->price = $request->input('price','');
        $book->c_id = $request->input('c_id','');
        if(!empty($request->file('icon'))){
//            dd(11);
            $request->file('icon')->move('book_icon',"book$id.jpg");
            $book->icon = "book_icon/book$id.jpg";
        }

        /*串行化存储数据*/
        $desc = $request->input('desc');
        $descString = serialize($desc);
        file_put_contents('book_desc/book'.$id.'.txt', $descString);

        $book->desc = 'book_desc/book'.$id.'.txt';
//        dd(22);
        $result = $book->save();
        if($result){
            return redirect('admin/book/list');
        }else{
            return back();
        }
    }

    /*二级联动的数据，返回到AJAX*/
    public function cate()
    {
        $data = Category::all();
        return $data;
    }

   /*删除书籍*/
    public function del($id)
    {
        /*删除书籍*/
        $book = Book::find($id);
        $book->delete();
        unlink("book_desc/book".$id.".txt");
        unlink("book_icon/book".$id.".jpg");
        /*删除书籍详情*/
        DB::table('books_info')->where('books_id',$id)->delete();
        $result = DB::table('books_info')->select('id')->where('books_id',$id)->get();
        foreach($result as $k => $v){
//            dump("book_content/book".$id."_".$v->id.".txt");
            unlink("book_content/book".$id."_".$v->id.".txt");
        }
        return redirect('admin/book/list');
    }
   /*显示书籍详情页面*/
    public function detailShow($id)
    {
        $b_id=$id;
        $book = Book_info::where('books_id',$b_id)->get();
        return view('admin/bookDetail',compact('b_id','book'));
    }
   /*书籍详情添加*/
    public function detailAdd($b_id)
    {
//        dd($b_id);
        return view('admin/bookDetailAdd',compact('b_id'));
    }
   /*执行添加*/
    public function detailDoAdd(Request $request,$b_id)
    {
//
//        dd($request->all());
        $rules = array(
            'title' => 'required',
            'url' => 'required',
        );
        $mess = array(
            'title.required' => '章节名不能为空',
            'url.required' => '内容不能为空',
        );
        $this->validate($request,$rules,$mess);
        $data = [
            'title' => $request->input('title'),
            'url' => "book_content/book".$b_id.".txt",
            'books_id' => $b_id,
        ];
//        $result = Book_info::insertGetid($data);
        $id = DB::table('books_info')->insertGetid($data);
        $result = Book_info::find($id);
        $result->url = "book_content/book".$b_id."_".$id.".txt";
        $result->save();
        if($result){
            /*把书籍内容串行化处理*/
            $url = $request->input('url');
            $descString = serialize($url);
            file_put_contents("book_content/book".$b_id."_".$id.".txt", $descString);
            return redirect('admin/book/detail'.'/'.$b_id);
        }else{
            return back();
        }
    }
   /*编辑操作*/
    public function detailEdit(Request $request,$id)
    {
        if($request->isMethod('post')){
            $rules = array(
                'title' => 'required',
                'url' => 'required',
            );
            $mess = array(
                'title.required' => '章节名不能为空',
                'url.required' => '内容不能为空',
            );
            $this->validate($request,$rules,$mess);
            $book = Book_info::find($id);
            $b_id = $book->books_id;
            $book->title = $request->input('title','');

            /*串行化*/
            $data = $request->input('url');
            $descString = serialize($data);
            file_put_contents("book_content/book".$b_id."_".$id.".txt", $descString);
            $book->url = "book_content/book".$b_id."_".$id.".txt";
            $result = $book->save();
            if($result){
                return redirect('admin/book/detail'.'/'.$b_id);
            }else{
                return back();
            }

        }else{
            $book = Book_info::find($id);
            $b_id = $book->books_id;
            $data = $book->url;
            $acString = file_get_contents($data);
            $url = unserialize($acString);
            return view('admin/bookDetailEdit',compact('book','url','b_id'));
        }

    }

    /*删除详情*/
    public function detailDel($id)
    {
        $book = Book_info::find($id);
        $b_id = $book->books_id;
        $book->delete();
        unlink("book_content/book".$b_id."_".$id.".txt");
       return redirect('admin/book/detail/'.$b_id);
    }
}
