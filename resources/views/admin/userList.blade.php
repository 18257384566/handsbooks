@extends('layouts.master')
@section('link')
    <link rel="stylesheet" href="{{url('/home/tk/css/xcConfirm.css')}}">
@endsection
@section('js')
    <script type="text/javascript" src="{{url('home/js/jquery.min.js')}}"></script>
    <script src="{{url('home/tk/js/xcConfirm.js')}}" type="text/javascript" charset="utf-8"></script>
    <script>
        $(document).ready(function() {
            $('.changeStatus').click(function () {
                var $_this = $(this);
//               var $status = $_this.html();
//               alert($_this.html());
                var $editId = $_this.parents().parents().children().first().html();
//                alert($editId);
                if($_this.html() == '激活'){
                    var txt = "确定要禁用用户吗？";
                    var option = {
                        title: "用户",
                        btn: parseInt("0011", 2),
                        onOk: function () {
                            location.href = "/admin/user/no/" + $editId;
                        }
                    }
                    window.wxc.xcConfirm(txt, "custom", option);
                }else{
                    var txt = "确定要激活用户吗？";
                    var option = {
                        title: "用户",
                        btn: parseInt("0011", 2),
                        onOk: function () {
                            location.href = "/admin/user/yes/" + $editId;
                        }
                    }
                    window.wxc.xcConfirm(txt, "custom", option);
                }

//               alert($editId);
            })

            $('.isAuthor').click(function(){
                var $_this = $(this);
//               var $status = $_this.html();
//               alert($_this.html());
                var $editId = $_this.parents().parents().children().first().html();
//                alert($editId);
                var txt = "确定要将用户升级为作者吗？";
                var option = {
                    title: "用户",
                    btn: parseInt("0011", 2),
                    onOk: function () {
                        location.href = "/admin/user/isAuthor/" + $editId;
                    }
                }
                window.wxc.xcConfirm(txt, "custom", option);
//               alert($editId);
            })
        })
    </script>
    @endsection
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
                    <span class="shortcut-icon icon-plus" aria-hidden="true"><a href="{{url('admin/user/add')}}">添加用户</a></span>
                    　<span class="shortcut-icon icon-trash" aria-hidden="true"><a href="">批量删除</a></span>　
                    <span class="shortcut-icon icon-circle-arrow-down" aria-hidden="true"><a href="">更新排序</a></span>
                    <hr>
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>头像</th>
                            <th>名字</th>
                            <th>邮箱</th>
                            <th>性别</th>
                            <th>作者</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        @foreach($result as $k => $v)
                            <tr>
                                <td>{{$v->u_id}}</td>
                                <td><img src="/{{$v->icon}}" alt="" width="50px" height="50px">{{$v->icon}}</td>
                                <td>{{$v->name}}</td>
                                <td>{{$v->email}}</td>
                                <td>@if($v->sex == 0) 男 @else 女 @endif</td>
                                <td><button class="btn btn-info isAuthor">@if($v->is_author == 0) 否 @else 是 @endif</button></td>
                                <td><button class="btn btn-warning changeStatus">@if($v->status == 0)激活@else禁用@endif</button></td>
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


