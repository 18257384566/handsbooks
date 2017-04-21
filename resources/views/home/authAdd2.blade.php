@extends('layouts/hmaster')
@section('hcss')
    <link rel="stylesheet" href="{{asset('home/css/publisher.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/zzsc.css')}}">
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
    <script type="text/javascript" src="{{url('home/js/zzsc.js')}}"></script>
    <script type="text/javascript" src="{{url('home/js/authAdd.js')}}"></script>
    <script src="/home/js/bootstrap.js"></script>
    <script type="text/javascript">

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
        </div>
    </div>

        <div style="height: 600px;">
            <div class="container">
<?php var_dump($status) ?>
            <div id="msform">
                <!-- progressbar -->
                <ul id="progressbar">
                    <li class="active">Account Setup</li>
                    <li>Social Profiles</li>
                    <li>Personal Details</li>
                </ul>
                <!-- fieldsets -->

                @if($status==0)
                <fieldset>
                    <h2 class="fs-title">掌阅书 作者认证</h2>
                    <h3 class="fs-subtitle">等待审核</h3>
                    <p>您提交的审核请求，管理员将在10个工作日内，给您答复。请耐心等待...</p>
                    {{--<input type="button" name="next" class="next action-button" value="Next" />--}}
                </fieldset>
                @else
                <fieldset>
                    <h2 class="fs-title">掌阅书 作者认证</h2>
                    <h3 class="fs-subtitle">认证成功</h3>
                    <p>恭喜您已成为 掌阅书 的驻站作者，快去发表您的文章吧...</p>
                    {{--<input type="submit" name="submit" class="submit action-button" value="Submit" />--}}
                </fieldset>
                @endif

            </div>
        </div>
    </div>
    <h2>&nbsp;</h2>
@endsection

