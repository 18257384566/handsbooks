@extends('layouts/hmaster')
@section('hcss')
    <style>
        a{
            font-size: 25px;
            text-decoration: none;
        }
        span{
            font-size: 25px;
            text-decoration: none;
            color: #4C7AB7;
        }
        .black{
            height: 400px;
            background-image: url("/home/image/article.jpg");
            background-size: 100%;
            position: relative;
            top:-100px;
        }
    </style>
    @endsection

@section('content')
    <div class="black">&nbsp;</div>
<div style="width: 1000px;margin:10px auto;">
    <h2 style="text-align: center;">{{$title}}</h2>
    <br>
    <p style="line-height:40px; text-indent:2em;font-size:18px;">{{$article}}</p>
</div>

<div style="width:700px;margin:20px auto;">
    @if (session('mess'))
        <span>第一章</span>
        @else
        <a href="{{url('/home/space/book/prev/'.$b_id)}}">上一章</a>
    @endif

　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
        @if (session('message'))
              <span>结束咯~~~</span>
          @else
              <a href="{{url('/home/space/book/next/'.$b_id)}}">下一章</a>
          @endif
</div>
    @endsection
