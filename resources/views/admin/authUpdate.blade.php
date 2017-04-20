@extends('layouts.master')
@section('title','权限管理')
@section('link')
    <style>
        input{height: 30px;}
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
{{--！nav--}}

{{--content--}}
@section('content')
    <div class="container">
        <!--结果集标题与导航组件 开始-->
        <div class="result_wrap">
            <div class="result_content">
                <div class="short_wrap">
                    <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                    <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                    <a href="#"><i class="fa fa-refresh"></i>用户修改</a>
                </div>
            </div>
        </div>
        <!--结果集标题与导航组件 结束-->
        <hr>
        <div class="result_wrap">
            <form action="" method="post" enctype="multipart/form-data" >
                {{csrf_field()}}
                <table class="add_tab">
                    <tbody>
                    @foreach($result as $item)
                        <tr>
                            <th><i class="require">*</i>姓名：</th>
                            <td>
                                <input type="text" class="mg" name="name" value="{{$item->name}}" > {{$errors->first('name')}}
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require">*</i>身份证正面照：</th>
                            <td>
                                <input type="file" name="nameid">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require">*</i>关注度：</th>
                            <td>
                                <input type="text" class="mg" name="focus" value="{{$item->focus}}"> {{$errors->first('focus')}}
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require">*</i>阅读量：</th>
                            <td>
                                <input type="text" class="mg" name="reader" value="{{$item->reader}}"> {{$errors->first('reader')}}
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input type="submit" value="提交">
                                <input type="button" class="back" onclick="history.go(-1)" value="返回">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>

@endsection
{{--!content--}}

@section('script')
    <script>

    </script>
@endsection

