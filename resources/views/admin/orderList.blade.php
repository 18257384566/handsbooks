@extends('layouts.master')
@section('link')
    <link rel="stylesheet" href="{{url('/home/tk/css/xcConfirm.css')}}">
    @endsection
@section('nav')
    <li ><a href="{{url('admin/index')}}"><i class="icon-home"></i><span>主页</span> </a> </li>
    <li><a href="{{url('admin/user/list')}}"><i class=" icon-user"></i><span>用户列表</span> </a> </li>
    <li><a href="{{url('admin/book/list')}}"><i class=" icon-columns"></i><span>书籍列表</span> </a></li>
    <li><a href="{{url('admin/category/list')}}"><i class="icon-list"></i><span>分类列表</span> </a> </li>
    <li  class="active"><a href="{{url('admin/order/list')}}"><i class=" icon-file"></i><span>订单列表</span> </a> </li>
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
@section('js')
    <script type="text/javascript" src="{{url('home/js/jquery.min.js')}}"></script>
    <script src="{{url('home/tk/js/xcConfirm.js')}}" type="text/javascript" charset="utf-8"></script>

    <script>
        $(document).ready(function(){
            /*取消订单*/
           $('.changeStatus').click(function(){
               var $_this = $(this);
//               var $status = $_this.html();
//               alert($_this.html());
               var $editId = $_this.parents().parents().children().first().html();
//               alert($editId);
               if($_this.html() == '已取消'){
                   var txt=  "订单已经取消了！！";
                   window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.error);
               }else{
                   var txt=  "确定要取消订单吗？";
                   var option = {
                       title: "订单",
                       btn: parseInt("0011",2),
                       onOk: function(){
                           location.href="/admin/order/changeStatus/"+$editId;
                       }
                   }
                   window.wxc.xcConfirm(txt, "custom", option);
//               alert($editId);
               }

           })

            /*确认支付*/
            $('.changePay').click(function(){
                var $_this = $(this);
                $editId = $_this.parents().parents().children().first().html();
                var txt=  "确定已支付吗？";
                var option = {
                    title: "订单",
                    btn: parseInt("0011",2),
                    onOk: function(){
                        location.href="/admin/order/changePay/"+$editId;
                    }
                }
                window.wxc.xcConfirm(txt, "custom", option);
            })
        })
    </script>
    @endsection
@section('content')
    <div class="table-responsive">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{url('admin/add')}}">添加用户</a>
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>订单号</th>
                            <th>购买用户</th>
                            <th>书名</th>
                            <th>价格</th>
                            <th>支付情况</th>
                            <th>状态</th>
                            <th>下单时间</th>
                            <th>操作</th>
                        </tr>
                        @foreach($order as $k => $v)
                            <tr>
                                @foreach($time as $keys => $values)
                                    @if($k == $keys)
                                        <td>{{$values->id}}</td>
                                        <input type="hidden" value="{{$values->id}}" name="id">
                                    @endif
                                @endforeach
                                <td>{{$v->ord_num}}</td>
                                <td>{{$v->name}}</td>
                                @foreach($books as $key => $value)
                                    @if($k == $key)
                                        <td>{{$value->title}}</td>
                                        <td>{{$value->price}}</td>
                                        <td><button class="btn btn-info changePay">@if($value->isPay == 0) 未支付 @else 已支付 @endif</button></td>
                                        <td><button class="btn btn-success changeStatus">@if($value->cancel == 0) 未取消 @else 已取消 @endif</button></td>
                                        @endif
                                @endforeach
                                @foreach($time as $keys => $values)
                                    @if($k == $keys)
                                    <td>{{$values->created_at}}</td>
                                            <td><a href="{{url('admin/order/del'.'/'.$values->id)}}" class="btn btn-danger">删除</a></td>
                                        @endif
                                    @endforeach

                            </tr>

                            @endforeach
                    </table>
                    {{$order->links('admin/page')}}
                </div>
            </div>

        </div>

    </div>
@endsection
@section('script')

    @endsection