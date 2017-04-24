<?php

namespace App\Http\Controllers\Home;

use App\Model\Publish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PublisherController extends Controller
{
    public function show()
    {
        $result = DB::table('publishes') ->paginate(12);
        return view('home/publisher')->with('result',$result);
    }

    public function info(Request $request,$id)
    {
        $books = DB::select("select b.id from books as b ,publishes as p where p.id = b.pub_id and p.id = $id");

        $pub = Publish::find($id);
        $icon = $pub->icon;
        return view('home/pub_info')->with('icon',$icon)->with('books',$books);
    }
}
