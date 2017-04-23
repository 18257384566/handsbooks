@extends('layouts/hmaster')
@section('title','个人中心')
@section('hcss')
    <link rel="stylesheet" href="{{url('home/css/spaceMaster.css')}}">
    <link href="{{asset('home/js/bootstrap.js')}}" rel="stylesheet">
    <link href="/home/css/jquery-accordion-menu.css" rel="stylesheet" type="text/css" />
    <link href="/home/css/font-awesome.css" rel="stylesheet" type="text/css" />
@endsection
@section('j-s')
    <link rel="stylesheet" href="{{asset('home/js/jquery-accordion-menu.js')}}">
@endsection

@section('content')
    {{--大图--}}
    <div class="head-img">
        <img src="{{url('home/image/space.jpg')}}" alt="" width="100%">
    </div>
    {{--结束大图--}}
    <div class="sidebar">
        <ul>
            <li>
                <img src="{{url('/'.$user->icon)}}" alt="" width="100px" height="100px" style="border-radius: 50%">
                <p>{{$user->name}}</p>
            </li>
            <li>
                <a href=""><h4>个人信息</h4></a>
            </li>
            <li>
                <a href=""><h4>我的图书</h4></a>
            </li>
            <li>
                <a href=""><h4>我的订单</h4></a>
            </li>
            @if($a_id)
            <li>
                <a href="authSpace/{{$a_id}}"><h4>作者space</h4></a>
            </li>
            @endif
            <li></li>
        </ul>
    </div>
    <div class="main">
        @yield('main')
    </div>

@endsection