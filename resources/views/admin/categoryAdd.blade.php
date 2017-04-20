@extends('layouts.master')
@section('link')
    <style>
        input{height:30px;}
    </style>
@endsection
@section('content')
    <div class="container">
        <!--面包屑导航 开始-->
        <div class="crumb_warp">
            <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
            <i class="fa fa-home"></i> <a href="{{asset('admin/index')}}">首页</a> &raquo; <a href="{{asset('admin/category/list')}}">分类管理</a> &raquo; 添加顶级分类
        </div>
        <!--面包屑导航 结束-->
        <hr>
        <div class="row">
            <div class="col-md-6">

                <form action="" method="post" >
                    {{csrf_field()}}
                    <table class="add_tab">
                        <tbody>
                        <tr>
                            <th>分类名：</th>
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
                            <th>pid：</th>
                            <td>
                                <input type="text"  name="pid" value="0" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>path：</th>
                            <td>
                                <input type="text"  name="path" value="0," readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>状态：</th>
                            <td>
                                <input type="radio"  name="display" value="1">显示
                                <input type="radio"  name="display" value="2" checked>隐藏
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
        </div>
    </div>

@endsection