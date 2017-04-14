<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

    <title>@yield('title','小说阅读')</title>
    <link rel="stylesheet" href="{{asset('/home/css/master.css')}}">
    <link rel="stylesheet" href="{{asset('/home/css/bootstrap.min.css')}}">
    @yield('hcss')
    <style>
        *{padding:0px; padding:0px;}
    </style>

</head>
<body>
        {{--导航--}}
        <nav class="navbar navbar-default">
            <div class="container head">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">logo</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="搜索">
                        </div>
                        <button type="submit" class="btn btn-default">提交</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{asset('home/login')}}">登陆</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">个人中心</a></li>
                                <li><a href="#">购物车</a></li>
                                <li><a href="#">我的订单</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
            <div class="master-type">
                <ul>
                    <li><a href="{{url('home/index')}}">首页</a></li>
                    <li><a href="{{url('home/cate')}}">分类</a></li>
                    <li><a href="">榜单</a></li>
                    <li><a href="">独家作品</a></li>
                    <li><a href="">机构专区</a></li>
                    <li><a href="">客户端</a></li>
                </ul>
            </div>

        </nav>
        {{--导航结束--}}

        {{--导航菜单--}}

        {{--导航菜单结束--}}

@yield('content')

        {{--留白--}}
        <div class="black"></div>


        {{--底部--}}
        <div class="master-foot">
            <div class="container">
                <div class="rows">
                    <div class="col-md-3">
                        <dl>
                            <dt>帮助</dt>
                            <dd>如何购买图书</dd>
                            <dd>常见问题</dd>
                            <dd>支付方式</dd>
                        </dl>
                    </div>
                    <div class="col-md-3">
                        <dl>
                            <dt>平台入住</dt>
                            <dd>机构专区</dd>
                            <dd>个人作者专区</dd>
                        </dl>
                    </div>
                    <div class="col-md-3">
                        <dl>
                            <dt>投诉与建议</dt>
                            <dd>问题反馈</dd>
                        </dl>
                    </div>
                    <div class="col-md-3">
                        <dl>
                            <dt>扫码下载客户端</dt>
                            <dd></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        {{--底部结束--}}
        <script src="{{url('home/js/jquery-2.1.4.min.js')}}"></script>
        <script src="{{url('home/js/bootstrap.js')}}"></script>
        @yield('j-s')
</body>
</html>
