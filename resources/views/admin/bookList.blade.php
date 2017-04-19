@extends('layouts.master')
@section('nav')
    <li><a href="{{url('admin/index')}}"><i class=" icon-home"></i><span>主页</span> </a> </li>
    <li><a href="{{url('admin/user/list')}}"><i class=" icon-user"></i><span>用户列表</span> </a> </li>
    <li class="active"><a href="{{url('admin/book/list')}}"><i class=" icon-columns"></i><span>书籍列表</span> </a></li>
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
            <span class="shortcut-icon icon-plus" aria-hidden="true"><a href="{{url('admin/book/add')}}">新增书籍</a></span> &nbsp;&nbsp;
            <span class="shortcut-icon icon-trash" aria-hidden="true"><a href="">批量删除</a></span> &nbsp;&nbsp;
            <span class="shortcut-icon icon-circle-arrow-down" aria-hidden="true"><a href="">更新排序</a></span> &nbsp;&nbsp;
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>封面</th>
                            <th>书名</th>
                            <th>分类</th>
                            <th>作者</th>
                            <th>出版社</th>
                            <th>操作</th>
                        </tr>
                        @foreach($result as $v)
                            <tr>
                                <td>{{$v->id}}</td>
                                <td><img src="/{{$v->icon}}" alt="" width="60px" height="80px">{{$v->icon}}</td>
                                <td>{{$v->title}}</td>
                                <td>{{$v->name}}</td>
                                <td></td>
                                <td>{{$v->pub_id}}</td>
                                <td><a href="{{url('admin/book/detail'.'/'.$v->id)}}" class="btn btn-info">详情</a>　<a href="{{url('admin/book/edit'.'/'.$v->id.'/?m='.$v->pid.'&a='.$v->c_id.'')}}" class="btn btn-success">编辑</a>　<a href="{{url('admin/book/del'.'/'.$v->id)}}" class="btn btn-danger">删除</a></td>
                            </tr>
                            @endforeach
                    </table>
                    {{$result->links('admin/page')}}
                </div>
            </div>

        </div>

    </div>
@endsection