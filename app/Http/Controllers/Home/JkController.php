<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JkController extends Controller
{
    public function show()
    {
        $xz = '双子座';
        if($_GET){
           $xz = $_GET['xz'];
        }


        return view('home/jk')->with('xz',$xz);
    }
}
