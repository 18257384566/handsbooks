<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IdeaController extends Controller
{
    public function show(Request $request)
    {
        if($request->isMethod('post')){

        }else{
            return view('home/idea');
        }
    }



}
