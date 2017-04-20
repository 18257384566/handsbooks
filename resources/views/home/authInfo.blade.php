@extends('layouts/hmaster')
@section('hcss')
    <link rel="stylesheet" href="{{asset('home/css/publisher.css')}}">
    <link rel="stylesheet" href="{{url('home/css/top_list.css')}}">
    <link rel="stylesheet" href="{{url('/home/css/auth.css')}}">
    <link rel="stylesheet" href="{{url('/home/css/authInfo.css')}}">
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
        $(function(){
            $('.gz').click(function(){
//                $(this).css('display','none');
                $(this).html('已关注');
            })

            $('#add').click(function(){
                location.href = "/home/authAdd";
            })



            setInterval(function(){
                //将最后一li前置到ul的最前面，然后 透明度 隐藏 下拉 淡入
                $('#box li:last').prependTo('#box ul').fadeTo(0, 0).hide().slideDown(1000).fadeTo(1000, 1);
            },3000)



        })

    </script>
@endsection
@section('content')
    {{--轮播图结束--}}
    <div style="height: 120px;"></div>
    <div style="background-image: url('/home/image/49b1OOOPIC79.jpg') ; background-size:100%;height: 320px; width: 100%">

            <div class="container">
                <div class="main" style="margin-top:20px; width:400px; background-color: rgba(255,255,255,0);">
                    <div class="left icon">
                        <img src="/home/image/zuo1.jpg" alt="" width=85%>
                    </div>
                    <div class="right detail">
                        <span><b>作者名</b></span> &nbsp; <button class="btn btn-default">关注</button>
                        <br>
                        <i class="fa fa-twitter bird"></i> 掌阅书驻站作者 <br><br>
                        <p style="width:900px;">                        读史者明知，具备必要的历史知识可以从往古的人和事件中找到供我们汲取的经验和教训，从而获得成功和完美人生的基石。另外，具备必要的文学能力也极其重要，必要的语言文字能力有利于我们同他人的沟通。
                        </p>
                        <br>
                        <p><b>2</b>作品 &nbsp; | <b>2515</b> 粉丝 </p>
                    </div>
                </div>
                <div class="rows">
                    <div class="col-md-3 ">
                        <div class="b-left">
                            <h5>最新粉丝</h5>
                            <hr>
                            @for($i=0;$i<6;$i++)
                                <div class="rows">
                                    <div class="col-md-4">
                                        <img src="{{url('home/image/zuo1.jpg')}}" alt="" width="50px;">
                                        <p  class="reader-user" title="vdsvfdbfdb">vdsvfdbfdb</p>
                                    </div>
                                </div>
                            @endfor
                            <br><br>
                            <h5>使用帮助</h5>
                            <hr>
                            <a href=""><h6>个人作者写作须知</h6></a>
                            <a href=""><h6>编辑平台使用手册</h6></a>
                            <a href=""><h6>联系我们auther@handsbooks.com</h6></a>
                        </div>
                    </div>

                    <div class="col-md-9 right b-right">
                        <h3>全部作品 （2）本</h3>
                        <hr>
                        @for($i=0;$i<4;$i++)
                        <div class="cols">
                            <div class="col-md-2">
                                <img src="{{url('home/image/w.jpg')}}" alt="" width="120px" height="160">
                            </div>
                            <div class="col-md-10 book-right">
                                <h4 style="float: left">十年一品温如言</h4> &nbsp;&nbsp;&nbsp; <p style="color:red; padding-top:10px; margin-left:30px; float: left" >￥:3.00</p>
                                <br><br>
                                    <p>1515人在阅读</p>
                                <p>相传五千年前，黄帝轩辕氏与刑天部落为了争夺统治权，进行了一场激烈大战。刑天被黄帝砍下头颅，乃以乳为目、以脐为口，执干戚舞。刑天失败后，带领残余部队躲进了另一维度空间，时刻想着重新夺...</p>
                                <br>
                                <a href="">喜欢</a> &nbsp;<a href="">分享</a>
                                <button class="btn btn-success right" style="margin-top:-5px;">立即阅读</button>
                            </div>
                        </div>

                            <hr>

                        @endfor
                    </div>
                </div>
          </div>

    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <p>&nbsp;</p>
@endsection
