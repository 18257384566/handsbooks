@extends('layouts.master')

@section('nav')
    <li><a href="{{url('admin/index')}}"><i class=" icon-home"></i><span>主页</span> </a> </li>
    <li><a href="{{url('admin/user/list')}}"><i class=" icon-user"></i><span>用户列表</span> </a> </li>
    <li class="active" ><a href="{{url('admin/book/list')}}"><i class=" icon-columns"></i><span>书籍列表</span> </a></li>
    <li><a href="{{url('admin/category/list')}}"><i class="icon-list"></i><span>分类列表</span> </a> </li>
    <li><a href="{{url('admin/order/list')}}"><i class=" icon-file"></i><span>订单列表</span> </a> </li>
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
            <span class="shortcut-icon icon-plus" aria-hidden="true"><a href="{{url('admin/book/detailadd'.'/'.$b_id)}}">新增书籍章节</a></span> &nbsp;&nbsp;
            <span class="shortcut-icon icon-trash" aria-hidden="true"><a href="">批量删除</a></span> &nbsp;&nbsp;
            <span class="shortcut-icon icon-circle-arrow-down" aria-hidden="true"><a href="">更新排序</a></span> &nbsp;&nbsp;
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>章节名字</th>
                            <th>审核</th>
                            <th>操作</th>
                        </tr>
                        @foreach($book as $k => $v)
                            <tr>
                                <td>{{$v->id}}</td>
                                <td>{{$v->title}}</td>
                                <td>通过</td>
                                <td><a href="{{url($v->url)}}" class="btn btn-success">查看</a>　<a href="{{url('admin/book/detailedit'.'/'.$v->id)}}" class="btn btn-info">编辑</a>　<a href="{{url('admin/book/detaildel'.'/'.$v->id)}}" class="btn btn-danger">删除</a></td>
                            </tr>
                        @endforeach
                    </table>
                    {{--{{$book->links('admin/page')}}--}}
                </div>
            </div>
        </div>
    </div>


@endsection


