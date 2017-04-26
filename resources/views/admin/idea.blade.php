@extends('layouts.master')
@section('title','意见反馈')
@section('link')
    <style>
    </style>
@endsection
{{--nav--}}
@section('nav')
    <li><a href="{{url('admin/index')}}"><i class=" icon-home"></i><span>主页</span> </a> </li>
    <li><a href="{{url('admin/user/list')}}"><i class=" icon-user"></i><span>用户列表</span> </a> </li>
    <li><a href="{{url('admin/book/list')}}"><i class=" icon-columns"></i><span>书籍列表</span> </a></li>
    <li><a href="{{url('admin/category/list')}}"><i class="icon-list"></i><span>分类列表</span> </a> </li>
    <li><a href="{{url('admin/order/list')}}"><i class=" icon-file"></i><span>订单列表</span> </a> </li>
    <li class="dropdown  active"><a href="" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><span>权限管理</span> <b class="caret"></b></a>
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
        <!--搜索结果页面 列表 开始-->
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                    <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="table table-bordered" style="table-layout:fixed" class="table table-condensed table-bordered table-hover table-striped">
                    <tr>
                        <th>ID</th>
                        <th>反馈内容</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>

                    @foreach($result as $item )
                        <tr>
                            <td class="tc id">{{$item->id}}</td>
                            <td style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">{{$item->info}}</td>
                            <td><button class="btn status" value= >{{$item->status==0?'未查看':'已阅'}}</button></td>
                            <td>
                                <a href="/admin/idea-del/{{$item->id}}">删除</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <!--搜索结果页面 列表 结束-->
    </div>
@endsection
{{--!content--}}
@section('script')
    <script>
        $(function(){

            $('.status').click(function(){
                $id = $(this).parent().parent().children(':first').html();
                alert($id);
                $.get('/admin/idea',{'status':$(this).html(),'id':$id},function(data){alert(data)});
                if( $(this).html() == '激活' ){
                    $(this).html('未查看');
                }else{
                    $(this).html('已阅');
                }
            });

            if($('#status').html() == '激活'){
                $(this).css('backgroundColor','green');
            }else{
                $(this).css('backgroundColor','red');
            }
        })
    </script>
@endsection