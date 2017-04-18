@extends('layouts.master')
@section('title','机构管理')
@section('link')
    <style>
        input{height:30px;}
    </style>
@endsection
{{--nav--}}
@section('nav')
    <li class="active" ><a href="{{url('admin/index')}}"><i class="icon-home"></i><span>主页</span> </a> </li>
    <li><a href="{{url('admin/userlist')}}"><i class=" icon-user"></i><span>用户列表</span> </a> </li>
    <li><a href="{{url('admin/bookList')}}"><i class=" icon-columns"></i><span>书籍列表</span> </a></li>
    <li><a href="{{url('admin/categoryList')}}"><i class="icon-list"></i><span>分类列表</span> </a> </li>
    <li><a href="{{url('admin/orderList')}}"><i class=" icon-file"></i><span>订单列表</span> </a> </li>
    <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><span>权限管理</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{asset('admin/perm')}}">权限管理</a></li>
            <li><a href="{{asset('admin/roles')}}">角色管理</a></li>
            <li><a href="pricing.html">管理员管理</a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="icons.html">Icons</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="pricing.html">Pricing Plans</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Signup</a></li>
            <li><a href="error.html">404</a></li>
        </ul>
    </li>
@endsection
{{--！nav--}}

{{--content--}}
@section('content')
    <div class="container">
        <span class="shortcut-icon icon-plus" aria-hidden="true"><a href="{{asset('/admin/publish-add')}}">新增机构</a></span> &nbsp;&nbsp;
        <span class="shortcut-icon icon-trash" aria-hidden="true"><a href="">批量删除</a></span> &nbsp;&nbsp;
        <span class="shortcut-icon icon-circle-arrow-down" aria-hidden="true"><a href="">更新排序</a></span> &nbsp;&nbsp;
        <hr>

        <!--面包屑导航 开始-->
        <div class="crumb_warp">
            <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
            <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">机构管理</a> &raquo; 添加机构
        </div>
        <!--面包屑导航 结束-->

        <div class="result_wrap">
            <form action="" method="post">
                {{csrf_field()}}
                <table class="add_tab">
                    <tbody>
                    <tr>
                        <th><i class="require">*</i>机构名称：</th>
                        <td>
                            <input type="text" class="mg" name="name"> {{ $errors ->first('name') }}
                        </td>
                    </tr>

                    <tr>
                        <th>机构描述：</th>
                        <td>
                            <textarea name="detail"></textarea> {{ $errors ->first('detail') }}
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
{{--!content--}}