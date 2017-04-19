<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

@yield('hcss')
<!-- PAGE TITLE -->
    <title>@yield('title','小说阅读网')</title>

    <style>
        .clean-main-menu {
            background-color: #28292e;
            background-color: transparent;
            border: 0 none;
            border-radius: 0;
            position: fixed;
            width: 100%;
            padding: 15px 0;
            margin-bottom: 0;
            z-index: 10;
            -webkit-transition: all .35s;
            -moz-transition: all .35s;
            -ms-transition: all .35s;
            -o-transition: all .35s;
            transition: all .35s;
        }

        .clean-main-menu.minified {
            background-color: #ffffff;
            padding: 0;
            position: fixed;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0), 0px 2px 10px 0px rgba(0, 0, 0, 0.08);
        }

        .clean-main-menu.minified {
            background-color: #ffffff;
            padding: 0;
            position: fixed;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0), 0px 2px 10px 0px rgba(0, 0, 0, 0.08);
        }
        .clean-main-menu {
            background-color: #28292e;
            background-color: transparent;
            border: 0 none;
            border-radius: 0;
            position: fixed;
            width: 100%;
            padding: 15px 0;
            margin-bottom: 0;
            z-index: 100;
            -webkit-transition: all .35s;
            -moz-transition: all .35s;
            -ms-transition: all .35s;
            -o-transition: all .35s;
            transition: all .35s;
        }
        .navbar {
            position: relative;
            min-height: 50px;
            margin-bottom: 20px;
            border: 1px solid transparent;
        }

        /*字体*/

        .clean-main-menu .navbar-nav li a:hover, .clean-main-menu .navbar-nav li.active a {
            color: #7CD552;
        }

        .clean-main-menu .navbar-nav {
            float: right;
            padding: 30px 0;
        }

        .clean-main-menu .navbar-nav li a {
            color: #333333;
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
            padding-top: 0;
            padding-bottom: 0;
            line-height: 30px !important;
            -webkit-transition: all .3s;
            -moz-transition: all .3s;
            -ms-transition: all .3s;
            -o-transition: all .3s;
            transition: all .3s;
        }

        /*图片*/
        .clean-main-slides img{height: 300px;}

        .clean-main-slides .clean-img-overlay {
            position: absolute;
            background-color: rgba(218, 218, 234, 0.42);
            width: 100%;
            height: 100%;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }

        /*footer*/
        .background-two {
            background-color: #f1f1f1;
        }
        footer {
            background-color: #28292e;
            padding: 60px;
            overflow: hidden;
        }
        article, aside, details, figcaption, figure, footer, header, hgroup, main, nav, section, summary {
            display: block;
        }
        article, aside, details, figcaption, figure, footer, header, hgroup, main, nav, section, summary {
            display: block;
        }
        foot{display:block;}
        footer .clean-footer-content {
            text-align: center;
        }
        *, *:before, *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        footer ul li {
            float: left;
            margin-right: 15px;
            border: 2px solid #818181;
            border-radius: 50%;
            width: 50px;
            font-size: 30px;
            list-style: none;
            line-height: 1.5;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
        }
        footer ul{
            margin-left:460px;
        }
        div.row {
            margin-right: -15px;
            margin-left: -80px;
        }
        /*pppp*/
        .sp-layer{
            text-align: center;
        }
        /*登陆注册*/
        .navbar{
            margin-top: 40px;
        }

    </style>

    <!-- ===================================
        BOOTSTRAP
    ==================================== -->
    <link rel="stylesheet" href="{{asset('home/css/bootstrap.min.css')}}">

    <!-- ===================================
        FONTS ICON
    ==================================== -->
    <link rel="stylesheet" href="{{asset('home/css/font-awesome/css/font-awesome.css')}}">

    <!-- ===================================
        PLUGIN
    ==================================== -->
    <link rel="stylesheet" href="{{asset('home/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/slider-pro.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/animate.css')}}">

    <!-- ===================================
        MAIN STYLESHEET
    ==================================== -->
    <link rel="stylesheet" href="{{asset('home/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/color-green.css" id="colors')}}">

    <!--[if lt IE 9]>
    <script src="{{url('home/js/html5shiv.min.js')}}"></script>
    <script src="{{url('home/js/respond.min.js')}}"></script>

    <script src="{{url('home/js/html5shiv.min.js')}}"></script>
    <script src="{{url('home/js/respond.min.js')}}"></script>
    <script type="text/javascript" src="{{url('home/js/selectivizr-min.js')}}"></script>
    <![endif]-->
    @yield('js')
</head>

<body>
<!-- ===================================
	PRELOADER
==================================== -->
<div class="preloader">
    <div class="status"></div>
</div>

<!-- ===================================
	HEADER
==================================== -->
<header>
    <!-- Navigation Menu start-->
    <nav class=" clean-main-menu" role="navigation">
        <div class="container">

            <!-- Navbar Toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Logo -->
                <a class="navbar-brand" href="index.html"><img style="margin-top:15px;" class="logo" id="logo" src="{{url('home/images/logo.png')}}" alt="Page"></a>

            </div>
            <!-- Navbar Toggle End -->

            <!-- navbar-collapse start-->
            <div id="nav-menu" class="navbar-collapse collapse" role="navigation">
                <ul class="nav navbar-nav clean-menu-wrapper ">
                    <li class="active">
                        <a href="{{asset('home/index')}}">首页</a>
                    </li>
                    <li>
                        <a href="{{asset('home/category')}}">分类</a>
                    </li>
                    <li>
                        <a href="#featured-works">榜单</a>
                    </li>
                    <li>
                        <a href="">独家作品</a>
                    </li>
                    <li>
                        <a href="{{asset('home/publisher')}}">机构专区</a>
                    </li>
                    <li>
                        <a href="#testimonial">客户端</a>
                    </li>
                </ul>
                <!-- navbar-collapse end-->
                <div class="navbar">
                    @if(Auth::check())
                        <a href="{{asset('home/login')}}" style="color: #81D362;">{{Auth::user()->name}}</a> |
                        <a href="{{asset('home/logout')}}" style="color: #81D362;">注销</a>
                    @else
                        <a href="{{asset('home/login')}}" style="color: #81D362;">登陆</a> |
                        <a href="{{asset('home/reg')}}" style="color: #81D362;">注册</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <!-- Navigation Menu end-->
</header>

@yield('content')
<!-- ===================================
	FOOTER SECTION
==================================== -->
<footer class="background-two">
    <div class="container">
        <div class="row">
            <div class="clean-footer-content">

                <div class="clean-footer-logo wow bounceIn" data-wow-offset="0">
                    <a href="index.html">
                        <img id="logo-footer" src="{{url('home/images/logo.png')}}" alt="clean">
                    </a>
                </div>

                <p class="clean-copyright-info">Copyright &copy; 2017 www.readnovel.com All Rights Reserved版权所有 上海网文欣阅科技有限公司</p>

                <ul class="clean-footer-social-info">
                    <li>
                        <a href=""><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</footer>

<!-- ===================================
	SCRIPTS
==================================== -->
<script src="{{url('home/js/jquery.min.js')}}"></script>
<script src="{{url('home/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{url('home/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('home/js/jquery.sliderPro.min.js')}}"></script>
<script src="{{url('home/js/owl.carousel.min.js')}}"></script>
<script src="{{url('home/js/jquery.countTo.js')}}"></script>
<script src="{{url('home/js/isotope.pkgd.min.js')}}"></script>
<script src="{{url('home/js/jquery.stellar.min.js')}}"></script>
<script src="{{url('home/js/wow.min.js')}}"></script>
<script src="{{url('home/js/jquery.nav.js')}}"></script>
<script src="{{url('home/js/custom.js')}}"></script>

@yield('j-s')
</body>
</html>