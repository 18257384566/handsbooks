@extends('layouts/hmaster')
@section('hcss')
    <link rel="stylesheet" href="{{asset('home/css/publisher.css')}}">
    <link rel="stylesheet" href="{{url('home/css/top_list.css')}}">
    <link rel="stylesheet" href="{{url('home/css/pub_info.css')}}">
    <style>
        .left{float: left;}
        .pu{width: 260px; height: 260px; background-color: #ffffff;}
    </style>
    <style>
        /*---------------------------样式归零 By 天涯浅唱 QQ：122452357----------------------*/
        abbr,address,article,aside,audio,b,blockquote,body,canvas,caption,cite,code,dd,del,details,dfn,div,dl,dt,em,fieldset,figcaption,figure,footer,form,h1,h2,h3,h4,h5,h6,header,hgroup,html,i,iframe,img,ins,kbd,label,legend,li,mark,menu,nav,object,ol,p,pre,q,samp,section,small,span,strong,sub,summary,sup,table,tbody,td,tfoot,th,thead,time,tr,ul,var,video{margin:0;padding:0;border:0;outline:0;font-size:100%;background:0 0;font-weight:400;font-style:inherit;font-family:inherit;vertical-align:top}body{line-height:1;color:#000;background:#fff;font-size:12px;font-family:'simsun'}article,aside,details,figcaption,figure,footer,header,hgroup,hr,menu,nav,section{display:block}nav ul,ol,ul{list-style:none}:focus,a{outline:0}a{margin:0;font-size:100 %;vertical-align:baseline;background:0 0;blr:expression(this.onFocus=this.blur())}a,ins{text-decoration:none}a,hr{padding:0}ins,mark{background-color:#ff9;color:#000}mark{font-style:italic;font-weight:700}blockquote,q{quotes:none}blockquote:after,blockquote:before,q:after,q:before{content:'';content:none}del{text-decoration:line-through}abbr[title],dfn[title]{border-bottom:1px dotted;cursor:help}table{border-collapse:collapse;border-spacing:0}caption,td,th{text-align:left;font-weight:400}hr{height:1px;border:0;border-top:1px solid #cccccc;margin:1em 0}input,select{vertical-align:middle;border:0}
        /*-------------------------归零样式END，请于样式表最前面调用-------------------------*/

        /*-----------------自定义按钮样式，移动端不需要，PC端根据实际情况选择----------------*/
        .demo {width: 1200px;height: 450px;font-size: 14px;position:relative;}
        .demo a.control {position:absolute;display: block;top: 50%;margin-top: -78px;width: 76px;height: 112px;cursor: pointer;z-index: 2;background: url(../images/buttons.png) no-repeat}
        .demo a.prev {left: 0;background-position: 0 0}
        .demo a.next {right: 0;background-position: -76px 0}
        .demo a.prev:hover {background-position: 0 -112px}
        .demo a.next:hover {background-position: -76px -112px}
        /*----------------------------为保证最佳效果，建议设置如下样式------------------------*/
        .slider {display: none}
    </style>
@endsection
@section('j-s')
    <script type="text/javascript" src="{{url('home/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('home/js/j-accordin.min.js')}}"></script>
    <script src="/home/js/bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.accordion').jaccordion();
        });
    </script>
@endsection
@section('content')
    {{--轮播图结束--}}
    <div style="height: 120px;"></div>
    <div style="background-color: #C1DBDA;height: 320px;">
        <div class="container box">
            <div class="rows">
                <div class="col-md-9"><img src="{{url('home/image/pub.jpg')}}" alt="" height="300px"></div>
            </div>
            <div class="col-md-3">
                <div style="width: 220px; height: 220px; background-color: #ffffff; margin-top: 40px;">
                    <img src="/picon/{{$icon}}" alt="" style="margin-top: 80px; margin-left: 29px;">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="publisher_main">
            <div class="publisher_title">
                <h4><b>本机构最新图书</b></h4>
                <hr>
            </div>
            <div class="publisher_content">
                <div class="rows">
                    <div class="col-md-9">
                        <ul>
                            @foreach ($books as $book)
                                <?php
                                    $b_id = $book->id;
                                    $result = DB::select("select b.`icon`,b.`title`, a.`name`,b.`price` from books as b, auths as a where b.id = $b_id and a.id = b.au_id");
                                ?>
                            <li>
                                <div class="box">
                                    <img src="/{{$result[0]->icon}}" alt="" width="130px;" style="border-radius: 8px;">
                                    <p>{{$result[0]->title}}</p>
                                    <p><span>作者：{{$result[0]->name}}</span> <span style="color:red">￥{{$result[0]->price}}</span></p>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="col-md-3">
                        <div class="top_list clear">
                            <h2>&nbsp;</h2>
                            <h4 style="margin-left:20px;">本机构热门榜单</h4>
                            <hr>
                            <div class="accordion_container">
                                <div class="accordion">
                                    <div class="first current">
                                        <div class="content">
                                            <img src="/home/img/y-01.jpg" width="60" height="80"/>
                                            <div class="word" >
                                                <p><a href="#">书名</a></p>
                                                <p><a href="#">作者：啦啦啦</a></p>
                                                <p>价格：<em style="color:#F00;"><strong>￥6088</strong></em></p><br />
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <span><img src="/home/img/tea1.jpg" /></span>
                                            <strong><a href="#" target="_blank">书名</a></strong>
                                        </div>

                                    </div>

                                    <div class="second">
                                        <div class="content second">
                                            <a href="#" target="_blank"><img src="/home/img/y-02.jpg" width="80" height="100"/></a>
                                            <div class="word" >
                                                <p>价格：<em style="color:#F00;"><strong>￥2999</strong></em></p><br />
                                                <p><a href="#">盛旺鸿运电脑经营</a></p>
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <span><img src="/home/img/tea2.jpg" /></span>
                                            <strong><a href="#" target="_blank">OPPO R5</a></strong>
                                        </div>
                                    </div>

                                    <div class="third">
                                        <div class="content third">
                                            <a href="#" target="_blank"><img src="/home/img/y-03.jpg" width="80" height="100"/></a>
                                            <div class="word" >
                                                <p>价格：<em style="color:#F00;"><strong>￥4999</strong></em></p><br />
                                                <p><a href="#">八一数码手机专营</a></p>
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <span><img src="/home/img/tea3.jpg" /></span>
                                            <strong><a href="#" target="_blank">索尼Xperia Z3</a></strong>
                                        </div>
                                    </div>

                                    <div class="four">
                                        <div class="content four">
                                            <a href="#" target="_blank"><img src="/home/img/y-04.jpg" width="80" height="100"/></a>
                                            <div class="word" >
                                                <p>价格：<em style="color:#F00;"><strong>￥5399</strong></em></p><br />
                                                <p><a href="#">八一数码手机专营</a></p>
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <span><img src="/home/img/tea4.jpg" /></span>
                                            <strong><a href="#" target="_blank">三星GALAXY Note4</a></strong>
                                        </div>
                                    </div>

                                    <div class="file">
                                        <div class="content file">
                                            <a href="#" target="_blank"><img src="/home/img/y-05.jpg" width="80" height="100" /></a>
                                            <div class="word" >
                                                <p>价格：<em style="color:#F00;"><strong>￥999</strong></em></p><br />
                                                <p><a href="#">宏达手机旗舰店</a></p>
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <span><img src="/home/img/tea5.jpg" /></span>
                                            <strong><a href="#" target="_blank">中兴V5 Max</a></strong>
                                        </div>
                                    </div>

                                    <div class="six">
                                        <div class="content six">
                                            <a href="#" target="_blank"><img src="/home/img/y-05.jpg" width="80" height="100" /></a>
                                            <div class="word" >
                                                <p>价格：<em style="color:#F00;"><strong>￥999</strong></em></p><br />
                                                <p><a href="#">宏达手机旗舰店</a></p>
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <span><img src="/home/img/tea6.jpg" /></span>
                                            <strong><a href="#" target="_blank">中兴V5 Max</a></strong>
                                        </div>
                                    </div>

                                    <div class="seven">
                                        <div class="content seven">
                                            <a href="#" target="_blank"><img src="/home/img/y-05.jpg" width="80" height="100" /></a>
                                            <div class="word" >
                                                <p>价格：<em style="color:#F00;"><strong>￥999</strong></em></p><br />
                                                <p><a href="#">宏达手机旗舰店</a></p>
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <span><img src="/home/img/tea7.jpg" /></span>
                                            <strong><a href="#" target="_blank">中兴V5 Max</a></strong>
                                        </div>
                                    </div>

                                    <div class="eight">
                                        <div class="content eight">
                                            <a href="#" target="_blank"><img src="/home/img/y-05.jpg" width="80" height="100" /></a>
                                            <div class="word" >
                                                <p>价格：<em style="color:#F00;"><strong>￥999</strong></em></p><br />
                                                <p><a href="#">宏达手机旗舰店</a></p>
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <span><img src="/home/img/tea8.jpg" /></span>
                                            <strong><a href="#" target="_blank">中兴V5 Max</a></strong>
                                        </div>
                                    </div>

                                    <div class="nine">
                                        <div class="content nine">
                                            <a href="#" target="_blank"><img src="/home/img/y-05.jpg" width="80" height="100" /></a>
                                            <div class="word" >
                                                <p>价格：<em style="color:#F00;"><strong>￥999</strong></em></p><br />
                                                <p><a href="#">宏达手机旗舰店</a></p>
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <span><img src="/home/img/tea9.jpg" /></span>
                                            <strong><a href="#" target="_blank">中兴V5 Max</a></strong>
                                        </div>
                                    </div>

                                    <div class="ten">
                                        <div class="content ten">
                                            <a href="#" target="_blank"><img src="/home/img/y-05.jpg" width="80" height="100" /></a>
                                            <div class="word" >
                                                <p>价格：<em style="color:#F00;"><strong>￥999</strong></em></p><br />
                                                <p><a href="#">宏达手机旗舰店</a></p>
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <span><img src="/home/img/tea10.jpg" /></span>
                                            <strong><a href="#" target="_blank">中兴V5 Max</a></strong>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('j-s')
    <link rel="stylesheet" href="{{asset('home/js/YuxiSlider.jQuery.min.js')}}">
    <link rel="stylesheet" href="{{asset('js/jquery.min.js')}}">
    <script>
        $(".slider").YuxiSlider({
            width:1200, //容器宽度
            height:350, //容器高度
            control:$('.control'), //绑定控制按钮
            during:4000, //间隔4秒自动滑动
            speed:800, //移动速度0.8秒
            mousewheel:true, //是否开启鼠标滚轮控制
            direkey:true //是否开启左右箭头方向控制
        });
    </script>
@endsection
