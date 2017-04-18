@extends('layouts.master')

@section('nav')
    <li><a href="{{url('admin/index')}}"><i class=" icon-home"></i><span>主页</span> </a> </li>
    <li class="active" ><a href="{{url('admin/user/list')}}"><i class=" icon-user"></i><span>用户列表</span> </a> </li>
    <li><a href="{{url('admin/book/list')}}"><i class=" icon-columns"></i><span>书籍列表</span> </a></li>
    <li><a href="{{url('admin/category/list')}}"><i class="icon-list"></i><span>分类列表</span> </a> </li>
    <li><a href="{{url('admin/order/list')}}"><i class=" icon-file"></i><span>订单列表</span> </a> </li>
    <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><span>权限管理</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{asset('admin/perm')}}">权限管理</a></li>
            <li><a href="{{asset('admin/roles')}}">角色管理</a></li>
            <li><a href="{{asset('admin/admin')}}">管理员管理</a></li>
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
@section('content')
    <div class="table-responsive">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{url('admin/user/add')}}">添加用户</a>
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>头像</th>
                            <th>名字</th>
                            <th>邮箱</th>
                            <th>性别</th>
                            <th>作者</th>
                            <th>操作</th>
                        </tr>
                        @foreach($result as $k => $v)
                            <tr>
                                <td>{{$v->u_id}}</td>
                                <td><img src="/{{$v->icon}}" alt="" width="50px" height="50px">{{$v->icon}}</td>
                                <td>{{$v->name}}</td>
                                <td>{{$v->email}}</td>
                                <td>@if($v->sex == 0) 男 @else 女 @endif</td>
                                <td>@if($v->is_author == 0) 否 @else 是 @endif</td>
                                <td><a href="{{url('admin/user/edit'.'/'.$v->u_id)}}" class="btn btn-info">编辑</a>　<a href="{{url('admin/user/del'.'/'.$v->id)}}" class="btn btn-danger">删除</a></td>
                            </tr>
                        @endforeach
                    </table>
                    {{$result->links('admin/page')}}
                </div>
            </div>
        </div>
    </div>


    @endsection

