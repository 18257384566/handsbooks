<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillboardController extends Controller
{
    public function show()
    {
        return view('home/Billboard');
    }
}
