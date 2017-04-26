@extends('layouts.master')
@section('link')
    <link rel="stylesheet" href="{{url('/home/tk/css/xcConfirm.css')}}">
@endsection
@section('nav')
    <li ><a href="{{url('admin/index')}}"><i class="icon-home"></i><span>主页</span> </a> </li>
    <li><a href="{{url('admin/user/list')}}"><i class=" icon-user"></i><span>用户列表</span> </a> </li>
    <li><a href="{{url('admin/book/list')}}"><i class=" icon-columns"></i><span>书籍列表</span> </a></li>
    <li><a href="{{url('admin/category/list')}}"><i class="icon-list"></i><span>分类列表</span> </a> </li>
    <li><a href="{{url('admin/order/list')}}"><i class=" icon-file"></i><span>订单列表</span> </a> </li>
    <li  class="active"><a href="{{url('admin/comment/list')}}"><i class="  icon-comment-alt"></i><span>评论管理</span> </a> </li>
    <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><span>权限管理</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{asset('admin/perm')}}">权限管理</a></li>
            <li><a href="{{asset('admin/roles')}}">角色管理</a></li>
            <li><a href="{{asset('admin/admin')}}">管理员管理</a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>其他</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="/admin/publish">机构管理</a></li>
            <li><a href="/admin/auth">作者管理</a></li>
        </ul>
    </li>
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
@section('content')
    <div class="table-responsive">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <form action="{{url('admin/comment/list')}}"  width="300px" style="float: right;">
                        <input type="search" name="search">　<input type="submit" value="搜索">
                    </form>
                    <hr width="1215px">
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
                    @if(!empty($search))
                        {{$comment->appends($search)->links('admin/page')}}
                    @else
                        {{$comment->links('admin/page')}}
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection


