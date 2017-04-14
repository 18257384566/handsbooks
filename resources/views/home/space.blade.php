@extends('layouts/hmaster')
@section('title','个人中心')
@section('hcss')
    <link rel="stylesheet" href="{{asset('home/css/space.css')}}">
    <link href="{{asset('home/js/bootstrap.js')}}" rel="stylesheet">
    <link href="/home/css/jquery-accordion-menu.css" rel="stylesheet" type="text/css" />
    <link href="/home/css/font-awesome.css" rel="stylesheet" type="text/css" />
@endsection
@section('j-s')
    <link rel="stylesheet" href="{{asset('home/js/jquery-accordion-menu.js')}}">
@endsection

@section('content')
    {{--大图--}}
    <div class="head-img">
        <img src="{{url('home/image/space.jpg')}}" alt="" width="100%">
    </div>
    {{--结束大图--}}
<div class="container">
    <div class="rows">

            <div id="jquery-accordion-menu" class="jquery-accordion-menu green">
                <div class="jquery-accordion-menu-header" id="form"><form class="filterform" action="#"><input class="filterinput" type="text"></form></div>
                <ul id="demo-list">
                    <li class="active"><a href="#"><i class="fa fa-home"></i>小说 <span class="submenu-indicator">+</span></a>
                        <ul class="submenu">
                            <li><a href="#">言情</a></li>
                            <li><a href="#">青春 </a></li>
                            <li><a href="#">都市 <span class="submenu-indicator">+</span></a>
                                <ul class="submenu">
                                    <li><a href="#">Graphics </a></li>
                                    <li><a href="#">Vectors </a></li>
                                    <li><a href="#">Photoshop </a></li>
                                    <li><a href="#">Fonts </a></li>
                                </ul>
                            </li>
                            <li><a href="#">历史</a></li>
                            <li><a href="#">科幻</a></li>
                            <li><a href="#">悬疑</a></li>
                            <li><a href="#">武侠</a></li>
                            <li><a href="#">灵异</a></li>
                            <li><a href="#">耽美</a></li>
                            <li><a href="#">其他</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-glass"></i>经济管理<span class="submenu-indicator">+</span></a>
                        <ul class="submenu">
                            <li><a href="#">企业管理</a></li>
                            <li><a href="#">经济金融</a></li>
                            <li><a href="#">投资理财</a></li>
                            <li><a href="#">市场营销</a></li>
                            <li><a href="#">财会统计</a></li>
                            <li><a href="#">通俗读物</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-file-image-o"></i>成功励志<span class="submenu-indicator">+</span></a>
                        <ul class="submenu">
                            <li><a href="#">成功学</a></li>
                            <li><a href="#">人在职场</a></li>
                            <li><a href="#">演讲口才</a></li>
                            <li><a href="#">人际处事</a></li>
                            <li><a href="#">心灵修养</a></li>
                            <li><a href="#">性格与情绪</a></li>
                            <li><a href="#">青少年励志</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-cog"></i>历史传记<span class="submenu-indicator">+</span></a>
                        <ul class="submenu">
                            <li><a href="#">Web Design </a></li>
                            <li><a href="#">Hosting </a></li>
                            <li><a href="#">Design <span class="submenu-indicator">+</span></a>
                                <ul class="submenu">
                                    <li><a href="#">Graphics </a></li>
                                    <li><a href="#">Vectors </a></li>
                                    <li><a href="#">Photoshop </a></li>
                                    <li><a href="#">Fonts </a></li>
                                </ul>
                            </li>
                            <li><a href="#">Consulting </a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-home"></i>计算机</a></li>
                    <li><a href="#"><i class="fa fa-suitcase"></i>两性情感<span class="submenu-indicator">+</span></a>
                        <ul class="submenu">
                            <li><a href="#">Web Design </a></li>
                            <li><a href="#">Graphics </a><span class="jquery-accordion-menu-label">10 </span>
                            </li>
                            <li><a href="#">Photoshop </a></li>
                            <li><a href="#">Programming </a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-user"></i>生活</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i>亲子少儿</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i>文学艺术</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i>社会科学</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i>科技</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i>原创男频</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i>原创女频</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i>外文</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i>期刊</a></li>

                </ul>
        </div>
    </div>
</div>
@endsection