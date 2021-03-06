@extends('layouts.master')
@section('title','图书修改')
@section('link')
    <style>
        input{height:30px;}
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
                    var boss = document.getElementById('boss');
                    var son = document.getElementById('son');
                    var pid = getUrlParam('m');
                    var id = getUrlParam('a');
                    for(var i in data){
                        if(data[i].path == '0,'){
//                            alert(data[i].id);
//                            boss.add(new Option(data[i].name,data[i].id));
                            if(data[i].id == pid){
                                $("#boss").append("<option value='"+data[i].id+"' selected>"+data[i].name+"</option>");
                            }else{
                                $("#boss").append("<option value='"+data[i].id+"'>"+data[i].name+"</option>");
                            }
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
                                if(data[j].id == id){
                                    $("#son").append("<option value='"+data[j].id+"' selected>"+data[j].name+"</option>");
                               }else{
                                    $("#son").append("<option value='"+data[j].id+"'>"+data[j].name+"</option>");
                                }
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

        function getUrlParam(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
            var r = window.location.search.substr(1).match(reg);  //匹配目标参数
            if (r != null) return unescape(r[2]); return null; //返回参数值
        }

    </script>
@endsection
@section('content')
    <div class="container">
        <!--面包屑导航 开始-->
        <div class="crumb_warp">
            <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
            <i class="fa fa-home"></i> <a href="{{asset('admin/index')}}">首页</a> &raquo; <a href="{{asset('admin/book/list')}}">书籍管理</a> &raquo; 添加书籍

        </div>
        <!--面包屑导航 结束-->
        <hr>
        <div class="result_wrap">
            <form action="" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <table class="add_tab">
                    <tbody>
                        <tr>
                            <th>书名：</th>
                            <td>
                                <input type="text" class="mg" name="title" value="{{$book->title}}">
                                @if($errors->first('title'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {{$errors->first('title')}}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>价格：</th>
                            <td>
                                <input type="text" class="mg" name="price" value="{{$book->price}}">
                                @if($errors->first('price'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {{$errors->first('price')}}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                                <th>分类：</th>
                                <td>
                                    <select name="" id="boss"></select>
                                    <select name="c_id" id="son"></select>
                                </td>
                        </tr>
                        <tr>
                                <th>出版社：</th>
                                <td>
                                    <select name="pub_id" id="">
                                        @foreach($publish as $k => $v)
                                            @if($v->id == $pub_id)
                                                <option value="{{$v->id}}" selected>{{$v->name}}</option>
                                            @else
                                                <option value="{{$v->id}}">{{$v->name}}</option>
                                            @endif
                                            @endforeach
                                    </select>
                                </td>
                        </tr>
                        <tr>
                            <th>作者：</th>
                            <td>
                                <select name="au_id" id="">
                                    @foreach($author as $k => $v)
                                        @if($v->id == $au_id)
                                            <option value="{{$v->id}}" selected>{{$v->name}}</option>
                                        @else
                                            <option value="{{$v->id}}">{{$v->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>描述：</th>
                            <td>
                                <textarea name="desc" id="" cols="30" rows="10" style="width: 600px;height: 230px;">{{$desc}}</textarea>
                                @if($errors->first('desc'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {{$errors->first('desc')}}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>图片：</th>
                            <td>
                                <input type="file"  name="icon">
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
