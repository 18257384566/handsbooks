<?php

namespace App\Http\Controllers\Home;

use App\Model\Ideae;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IdeaController extends Controller
{
    public function show(Request $request)
    {
        if($request->isMethod('post')){
            $u_id = session('u_id');

            //存储
            Ideae::create([
                'u_id' => $u_id,
                'info' => $request->input('info'),
            ]);
            return redirect('/home/index');
        }else{
            return view('home/idea');
        }
    }



}
