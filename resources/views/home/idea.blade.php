@extends('layouts/hmaster')
@section('title','意见反馈')
@section('hcss')
    <style>
        .out{height:500px;margin-top:200px; width: 500px;}
        .btn{margin-top:10px;}

        @endsection
    </style>
@section('content')
    <div class="container">
        <div class="out">
            <h5>尊敬的读者，欢迎您为我们掌阅书网站提供宝贵的建议：</h5>
            <form action="" method="post">
                {{csrf_field()}}
                <textarea name="info" class="form-control" cols="30" rows="10"></textarea>

                <button class="sub btn btn-success">提交</button>
            </form>
        </div>
    </div>
    @endsection

@section('j-s')
    <script>
        $(function(){
            $('.sub').click(function(){
                alert('您的建议已经提交，掌阅一直在您身边');
            })

        })
    </script>
    @endsection

