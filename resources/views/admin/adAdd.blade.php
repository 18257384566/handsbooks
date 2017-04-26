@extends('layouts.master')
@section('title','广告管理')
@section('link')
    <style>
        input{
            height:30px;
        }

    </style>
@endsection
@section('js')
    <script src="{{url('/admin/js/jquery-1.8.3.min.js')}}"></script>
    <script>
        $(function(){
            $.ajax({
                url:'/admin/book/cate',
                type:'get',
                data:{
                    '_token':'{{csrf_token()}}'
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
//                    alert(data);
                    var boss = document.getElementById('boss');
                    var son = document.getElementById('son');
                    for(var i in data){
                        if(data[i].path == '0,'){
//                            alert(data[i].id);
//                            boss.add(new Option(data[i].name,data[i].id));

                            $("#boss").append("<option value='"+data[i].id+"'>"+data[i].name+"</option>");
                        }
                    }

                    //然后根据省份的选择决定 城市和区的显示内容
                    boss.onchange = function(){
                        //将之前的清空
                        son.length = 0;
                        var index = boss.value;

                        for(var j in data){

                            if(data[j].pid == index){
//                                son.add(new Option(data[j].name,data[j].id));

                                $("#son").append("<option value='"+data[j].id+"'>"+data[j].name+"</option>");
                            }
                        }
                    }


                    //在页面载入完成后 自动触发一次选择
                    boss.onchange();
                },
                error:function(){
                    alert("失败");
                },
                dataType:'json',
                async: false
            });

        })

    </script>
@endsection
@section('content')
    <div class="container">

        <!--面包屑导航 开始-->
        <div class="crumb_warp">
            <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
            <i class="fa fa-home"></i> <a href="{{asset('admin/index')}}">首页</a> &raquo; <a href="{{asset('admin/ad/list')}}">广告管理</a> &raquo; 添加广告
        </div>
        <!--面包屑导航 结束-->
        <hr>
        <div class="result_wrap">
            <form action="{{url('admin/ad/add')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <table class="add_tab">
                    <tbody>
                    <tr>
                        <th>名字</th>
                        <td>
                            <input type="text" class="mg" name="name">
                            @if($errors->first('name'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{$errors->first('name')}}
                                </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>url</th>
                        <td>
                            <input type="text" class="mg" name="url">
                            @if($errors->first('url'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{$errors->first('url')}}
                                </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>封面</th>
                        <td>
                            <input type="file"   name="icon" >
                            @if($errors->first('icon'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{$errors->first('icon')}}
                                </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                    </tbody>
                </table>

            </form>
        </div>


@endsection

