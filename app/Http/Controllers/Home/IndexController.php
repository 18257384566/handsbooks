<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function show()
    {
        //轮播图
        $result = DB::table('slideshows')->get();
        return view('home.index')->with('result',$result);
    }
}
