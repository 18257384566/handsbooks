@extends('layouts.master')
@section('js')
    <style>
        input{
            width: 300px;
            height: 30px;
        }
    </style>
    @endsection
@section('content')
    <div class="container">
        <!--面包屑导航 开始-->
        <div class="crumb_warp">
            <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
            <i class="fa fa-home"></i> <a href="{{asset('admin/index')}}">首页</a> &raquo; <a href="{{asset('admin/user/list')}}">用户管理</a> &raquo; 添加用户
        </div>
        <!--面包屑导航 结束-->
        <hr>
        <div class="row">
            <div class="col-md-6">
                <form action="{{url('admin/user/doAdd')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <table class="add_tab">
                        <tbody>
                        <tr>
                            <th>　用户名：</th>
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
                            <th>　　邮箱：</th>
                            <td>
                                <input type="email" class="mg" name="email">
                                @if($errors->first('email'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {{$errors->first('email')}}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>　　密码：</th>
                            <td>
                                <input type="password" class="mg" name="password">
                                @if($errors->first('password'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {{$errors->first('password')}}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>确认密码：</th>
                            <td>
                                <input type="password" class="mg" name="password_confirmation">
                                @if($errors->first('password_confirmation'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {{$errors->first('password_confirmation')}}
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
        </div>
    </div>

@endsection