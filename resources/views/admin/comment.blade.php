@extends('layouts.master')
@section('link')
    <link rel="stylesheet" href="{{url('/home/tk/css/xcConfirm.css')}}">
@endsection
@section('js')
    <script type="text/javascript" src="{{url('home/js/jquery.min.js')}}"></script>
    <script src="{{url('home/tk/js/xcConfirm.js')}}" type="text/javascript" charset="utf-8"></script>
    <script>
        $(document).ready(function() {
            $('.status').click(function () {
                var $_this = $(this);
//               var $status = $_this.html();
//               alert($_this.html());
                var $editId = $_this.parents().parents().children().first().html();
//                alert($editId);
                if($_this.html() == '显示'){
                    var txt = "确定要隐藏评论吗？";
                    var option = {
                        title: "评论",
                        btn: parseInt("0011", 2),
                        onOk: function () {
                            location.href = "/admin/comment/hide/" + $editId;
                        }
                    }
                    window.wxc.xcConfirm(txt, "custom", option);
//               alert($editId);
                }else{
                    var txt = "确定要显示评论吗？";
                    var option = {
                        title: "评论",
                        btn: parseInt("0011", 2),
                        onOk: function () {
                            location.href = "/admin/comment/display/" + $editId;
                        }
                    }
                    window.wxc.xcConfirm(txt, "custom", option);
                }

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
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>订单号</th>
                            <th>用户名</th>
                            <th>书籍</th>
                            <th>评论</th>
                            <th>时间</th>
                            <th>状态</th>
                        </tr>
                        @foreach($comment as $k => $v)
                            <tr>
                                <td>{{$v->id}}</td>
                                <td>{{$v->ord_num}}</td>
                                <td>{{$v->name}}</td>
                                @foreach($book as $key=>$value)
                                    @if($k == $key)
                                <td>{{$value->title}}</td>
                                    @endif
                                @endforeach
                                <td>{{$v->comment}}</td>
                                <td>{{$v->created_at}}</td>
                                <td><button class="btn btn-info status">@if($v->status == 0)显示@else隐藏@endif</button></td>
                            </tr>
                        @endforeach
                    </table>
                    {{$comment->links('admin/page')}}
                </div>
            </div>
        </div>
    </div>


@endsection


