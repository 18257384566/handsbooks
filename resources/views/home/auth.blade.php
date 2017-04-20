@extends('layouts/hmaster')
@section('hcss')
    <link rel="stylesheet" href="{{asset('home/css/publisher.css')}}">
    <link rel="stylesheet" href="{{url('home/css/top_list.css')}}">
    <link rel="stylesheet" href="{{url('/home/css/auth.css')}}">
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
    <div style="background-color: #C1DBDA;height: 320px;">
        <div class="container box">
            <div class="rows">
                <div class="col-md-9"><img src="{{url('home/image/pub.jpg')}}" alt="" height="300px"></div>
            </div>
            <div class="col-md-3">
                <div class="main">
                    <h3>成为掌阅书作者</h3>
                    <h5>分享你的专业知识和方法论</h5>
                    <hr>
                    <h4>已有12355人加入</h4>
                    <h4>已有123机构加入</h4>
                    <button class="btn btn-success" id="add">申请加入</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="publisher_main">
            <div class="publisher_title">
                <h3><b>作者推荐</b></h3>
                <hr>
            </div>
            <div class="publisher_content">
                <div class="rows">
                    <div class="col-md-12">
                        <h2>&nbsp;</h2>
                        <ul>
                            @for($i=0;$i<4;$i++)
                            <li>
                                <div class="col-md-3 agile_team_grid">
                                    <div class="ih-item circle effect1">
                                        <div class="spinner"></div>
                                        <div class="img"><img src="http://laravel-sh60.dev/home/image/zuo1.jpg" alt=" " class="img-responsive"></div>
                                        <div class="info">
                                            <div class="info-back">
                                                <h4>顾漫</h4>
                                                <p>青春小说</p>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><button class="btn btn-warning gz">关注</button></h4>
                                    {{--<div class="ff">--}}
                                    {{--<div class="ff" style="display:block;white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">--}}
                                    <div class="ff" style="  white-space: nowrap; overflow:hidden; text-overflow:ellipsis; ">
                                        <p>职业投资人，擅长营销策划和美食。</p>
                                        <p>代表作品：《微微一笑很倾城》</p>
                                    </div>
                                </div>
                            </li>
                            @endfor
                        </ul>
                    </div>
                </div>
                <div class="rows">
                    <div class="col-md-9">
                        <h3><b>互联网</b></h3>
                        <hr>

                    @for($i=0; $i<6;$i++)
                        <div class="col-md-4">
                            <h4>&nbsp;</h4>
                           <div class="book">
                               <h5>互联网广告算法和系统实践</h5>
                               <div style="width: 40%;" class="left">
                                   <img src="{{url('home/image/w.jpg')}}" alt="" width="100px;">
                               </div>
                               <div style="width: 60%; padding-left: 5px; height: 133px; overflow: hidden "  class="left">
                                   <img src="{{url('home/image/start.jpg')}}" alt="">
                                   <p>54534人阅读 <br>25条评论</p>
                                   <p>计算机专业的在校学生，刚踏入互联网公司的新人（包括产品经理）入门计算机专业的在校学生</p>
                                   {{--<p title="计算机专业的在校学生，刚踏入互联网公司的新人（包括产品经理）入门计算机专业的在校学生，刚踏入互联网公司的新人（包括产品经理）入门" style="height:50px;width: 100px;overflow: hidden; display: block; text-overflow: ellipsis; white-space: nowrap; cursor: pointer;  ">计算机专业的在校学生，刚踏入互联网公司的新人（包括产品经理）入门计算机专业的在校学生，刚踏入互联网公司的新人（包括产品经理）入门</p>--}}
                               </div>
                           </div>

                            <div class="simple">
                                <p>作者简介：</p>
                                <div class="col-md-2">
                                    <img src="{{url('home/image/w.jpg')}}" alt="" width="40px;" height="40px; ">
                                </div>
                                <div class="col-md-10">
                                    <p style="height:38px; overflow: hidden; margin-top: 2px; margin-left:8px; width: 160px;overflow: hidden; display: block; text-overflow: ellipsis; white-space: nowrap; cursor: pointer;"><a href="">作者名</a> <br>互联网专业作者，研究方向为广告搜索算法。</p>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>

                        <div class="col-md-3">
                            <h3>热门作家</h3>
                            <div id="box">
                                <ul>
                                    @for($i=0; $i<9; $i++)
                                    <li>
                                       <div class="hot">
                                           <div class="h-img left"><a href=""><img src="{{url('home/image/w.jpg')}}" alt="" width="50px" height="50px"></a></div>
                                           <div class="h-mian left">
                                               <p><a href="">作者名{{$i}}</a></p>
                                               <p title="代表作：啦啦啦啦" style="width: 100px;overflow: hidden; display: block; text-overflow: ellipsis; white-space: nowrap; cursor: pointer;  ">代表作：啦啦啦啦</p>
                                           </div>
                                       </div>
                                    </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
    <h2>&nbsp;</h2>
@endsection

@section('j-s')
    <script>

    </script>
    @endsection
