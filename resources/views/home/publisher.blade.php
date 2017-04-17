@extends('layouts/hmaster')
@section('hcss')
    <link rel="stylesheet" href="{{asset('home/css/publisher.css')}}">
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

@section('content')
    {{--<img src="{{url('home/image/49b1OOOPIC79.jpg')}}" alt="">--}}
    {{--轮播图--}}
    {{--<div class="demo">--}}
        {{--<a class="control prev"></a><a class="control next abs"></a><!--自定义按钮，移动端可不写-->--}}

        {{--<div class="slider"><!--主体结构，请用此类名调用插件，此类名可自定义-->--}}
            {{--fhbvfdb--}}
            {{--<ul>--}}
                {{--<li>vbfhdvbfd</li>--}}
                {{--<li><a href=""><img src="images/1.jpg" alt="两弯似蹙非蹙笼烟眉，一双似喜非喜含情目。" /></a></li>--}}
                {{--<li><a href=""><img src="images/2.jpg" alt="态生两靥之愁，娇袭一身之病。" /></a></li>--}}
                {{--<li><a href=""><img src="images/3.jpg" alt="泪光点点，娇喘微微。" /></a></li>--}}
                {{--<li><a href=""><img src="images/4.jpg" alt="闲静似娇花照水，行动如弱柳扶风。" /></a></li>--}}
                {{--<li><a href=""><img src="images/5.jpg" alt="心较比干多一窍，病如西子胜三分。" /></a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
    <center>
     <img src="{{url('home/image/org1.jpg')}}" alt="" width="1200">
    </center>
    {{--轮播图结束--}}
    <div class="container">
        <div class="publisher_main">
            <div class="publisher_title">
                <h4><b>全部入驻机构</b></h4>
                <hr>
            </div>
            <div class="publisher_content">
                <div class="publisher_info">
                    <div class="publisher_icon">
                        <img src="/home/img/publisher01.jpg" alt="" width="200" height="70">
                    </div>
                    <div class="publisher_pop">
                        <span class="publisher_num">阅读人数:5464123</span>　<span class="glyphicon glyphicon-thumbs-up"></span><span>(1443)</span>
                    </div>
                </div>
                <div class="publisher_info">
                    <div class="publisher_icon">
                        <img src="/home/img/publisher02.jpg" alt="" width="200" height="70">
                    </div>
                    <div class="publisher_pop">
                        <span class="publisher_num">阅读人数:5464123</span>　<span class="glyphicon glyphicon-thumbs-up"></span><span>(1443)</span>
                    </div>
                </div>
                <div class="publisher_info">
                    <div class="publisher_icon">
                        <img src="/home/img/publisher03.jpg" alt="" width="200" height="70">
                    </div>
                    <div class="publisher_pop">
                        <span class="publisher_num">阅读人数:5464123</span>　<span class="glyphicon glyphicon-thumbs-up"></span><span>(1443)</span>
                    </div>
                </div>
                <div class="publisher_info">
                    <div class="publisher_icon">
                        <img src="/home/img/publisher04.jpg" alt="" width="200" height="70">
                    </div>
                    <div class="publisher_pop">
                        <span class="publisher_num">阅读人数:5464123</span>　<span class="glyphicon glyphicon-thumbs-up"></span><span>(1443)</span>
                    </div>
                </div>
                <div class="publisher_info">
                    <div class="publisher_icon">
                        <img src="/home/img/publisher05.jpg" alt="" width="200" height="70">
                    </div>
                    <div class="publisher_pop">
                        <span class="publisher_num">阅读人数:5464123</span>　<span class="glyphicon glyphicon-thumbs-up"></span><span>(1443)</span>
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
