@extends('layouts/hmaster')
@section('hcss')
    <style>
        a{
            font-size: 25px;
            text-decoration: none;
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
      @if(empty($prev))
        <a href="">第一章</a>
          @else
        <a href="{{url('/home/detail/article/'.$b_id.'/'.$prev)}}">上一章</a>
    @endif
    　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
          @if(empty($next))
              <a href="">结束咯~~~</a>
          @else
              <a href="{{url('/home/detail/article/'.$b_id.'/'.$next)}}">下一章</a>
          @endif
</div>
    @endsection
