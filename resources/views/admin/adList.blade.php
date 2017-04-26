@extends('layouts.master')
@section('title','广告管理')
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
                var $editId = $_this.parents().parents().children().first().html();
//                alert($editId);
//                alert($_this.text().toString() == "上架");
                if($_this.html() == "激活"){
//                    alert(1);
                    var txt = "确定要将广告禁用吗？";
                    var option = {
                        title: "广告",
                        btn: parseInt("0011", 2),
                        onOk: function () {
                            location.href = "/admin/ad/down/" + $editId;
                        }
                    }
                    window.wxc.xcConfirm(txt, "custom", option);
//               alert($editId);
                }else{
//                    alert(2);
                    var txt = "确定要将广告激活吗？";
                    var option = {
                        title: "广告",
                        btn: parseInt("0011", 2),
                        onOk: function () {
                            location.href = "/admin/ad/up/" + $editId;
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
    <li><a href="{{url('admin/user/list')}}"><i class=" icon-user"></i><span>用户列表</span> </a> </li>
    <li><a href="{{url('admin/book/list')}}"><i class=" icon-columns"></i><span>书籍列表</span> </a></li>
    <li><a href="{{url('admin/category/list')}}"><i class="icon-list"></i><span>分类列表</span> </a> </li>
    <li><a href="{{url('admin/order/list')}}"><i class=" icon-file"></i><span>订单列表</span> </a> </li>
    <li><a href="{{url('admin/comment/list')}}"><i class="  icon-comment-alt"></i><span>评论管理</span> </a> </li>
    <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><span>权限管理</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{asset('admin/perm')}}">权限管理</a></li>
            <li><a href="{{asset('admin/roles')}}">角色管理</a></li>
            <li><a href="{{asset('admin/admin')}}">管理员管理</a></li>
        </ul>
    </li>
    <li class="dropdown active" ><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="icons.html">Icons</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="pricing.html">Pricing Plans</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Signup</a></li>
            <li><a href="{{url('admin/ad/list')}}">广告管理</a></li>
        </ul>
    </li>
@endsection
@section('content')

    <div class="table-responsive">
        <div class="container">
            <span class="shortcut-icon icon-plus" aria-hidden="true"><a href="{{url('admin/ad/add')}}">新增书籍</a></span> &nbsp;&nbsp;
            <span class="shortcut-icon icon-trash" aria-hidden="true"><a href="">批量删除</a></span> &nbsp;&nbsp;
            <span class="shortcut-icon icon-circle-arrow-down" aria-hidden="true"><a href="">更新排序</a></span> &nbsp;&nbsp;

            　　　　　　　　　　　　　
            <form action="{{url('admin/ad/list')}}"  width="300px" style="float: right;">
                <input type="search" name="search">　<input type="submit" value="搜索">
            </form>
            <hr width="1215px">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>封面</th>
                            <th>url</th>
                            <th>名字</th>
                            <th>添加时间</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        @foreach($ad as $k => $v)
                            <tr>
                                <td>{{$v->id}}</td>
                                <td><img src="/{{$v->icon}}" alt="" width="200px" height="100px"></td>
                                <td>{{$v->url}}</td>
                                <td>{{$v->name}}</td>
                                <td>{{$v->created_at}}</td>
                                <td><button class="btn btn-success status">@if($v->status == 0)禁用@else激活@endif</button></td>
                                <td><a class="btn btn-info" href="{{url('admin/ad/edit/'.$v->id)}}">编辑</a>　<a href="{{url('admin/ad/del/'.$v->id)}}" class="btn btn-danger">删除</a></td>
                            </tr>
                            @endforeach
                    </table>
                    @if(!empty($search))
                        {{$ad->appends($search)->links('admin/page')}}
                    @else
                        {{$ad->links('admin/page')}}
                    @endif
                </div>
            </div>

        </div>

    </div>
@endsection