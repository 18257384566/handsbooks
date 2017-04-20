@extends('layouts.master')
@section('link')
    <style>
        input{height:30px;margin-top:10px;}
    </style>
@endsection
@section('content')
    <div class="container">
        <span class="shortcut-icon icon-plus" aria-hidden="true"><a href="">更新角色</a></span> &nbsp;&nbsp;
        <span class="shortcut-icon icon-trash" aria-hidden="true"><a href="">批量删除</a></span> &nbsp;&nbsp;
        <span class="shortcut-icon icon-circle-arrow-down" aria-hidden="true"><a href="">更新排序</a></span> &nbsp;&nbsp;
        <hr>

        <!--面包屑导航 开始-->
        <div class="crumb_warp">
            <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
            <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="{{asset('admin/user/list')}}">用户管理</a> &raquo; 修改用户
        </div>
        <!--面包屑导航 结束-->
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <table class="add_tab">
                        <tbody>
                        <tr>
                            <th>用户名：</th>
                            <td>
                                <input type="text" class="mg" name="name" value="{{$user->name}}">
                                @if($errors->first('name'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {{$errors->first('name')}}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>　性别：</th>
                            <td>
                                <input type="radio" name="sex" value="0" @if($user->sex == 0) checked @endif>男
                                <input type="radio" name="sex" value="1" @if($user->sex == 1) checked @endif>女
                            </td>
                        </tr>
                        <tr>
                            <th>　作者：</th>
                            <td>
                                <input type="radio" name="is_author" value="0" @if($user->is_author == 0) checked @endif>否
                                <input type="radio" name="is_author" value="1" @if($user->is_author == 1) checked @endif>是
                            </td>
                        </tr>
                        <tr>
                            <th>　头像：</th>
                            <td>
                                <input type="file" name="icon" value="{{$user->icon}}">
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