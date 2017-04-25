@extends('layouts/hmaster')
@section('title','分类')
@section('js')
    <script>
        function getUrlParam(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
            var r = window.location.search.substr(1).match(reg);  //匹配目标参数
            if (r != null) return unescape(r[2]); return null; //返回参数值
        }

        var id = getUrlParam('id');

    </script>
    @endsection
@section('hcss')
    <link href="/home/css/jquery-accordion-menu.css" rel="stylesheet" type="text/css" />
    <link href="/home/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="/dist/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        *{box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;}
        body{background:#fff;}
        .content{width:260px;margin:70px;}
        .filterinput{
            background-color:rgba(249, 244, 244, 0);
            border-radius:15px;
            width:90%;
            height:30px;
            border:thin solid #FFF;
            text-indent:0.5em;
            font-weight:bold;
            color:#FFF;
        }
        #demo-list a{
            overflow:hidden;
            text-overflow:ellipsis;
            -o-text-overflow:ellipsis;
            white-space:nowrap;
            width:100%;
        }
        .breadcrumb{
            margin-left:20px ;
        }
        .books_list{
            margin-left:380px;
            width: 1100px;
            height: 1000px;
            /*background-color: pink;*/
        }
        .books_list01{
            margin-left:28px;
            margin-top: 15px;
            width: 210px;
            height: 310px;
            /*background-color: skyblue;*/
            float:left;
        }
        .books_list01:hover{
            background-color: #F5F5F5;
        }
        .books_list01 img{
            margin-top:10px;
            margin-left:15px;
        }
        .books_info{
            width:180px;
            margin:5px auto;
        }
        .books_list01 .right{
            float:right;
            color:red;
            margin-left:15px;
        }
        .books_list01 .left{
            float:left;
            margin-right:15px;
        }
        .books_rec{
            float:left;
            width: 300px;
            height: 200px;
            /*background-color: #ccc;*/
            margin-left:80px;
        }


        /*hmaster*/
        .clean-main-menu.minified{margin-top:-20px;}
        .content{margin-top:20px;}
        .black{width: 100%; height:auto; background-image: url('/home/image/cate.jpg'); magin:0 auto; height: 189px;}
        .books_rec{margin-top: -242px;}

    </style>
@endsection

@section('j-s')
    <script src="/home/js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="/home/js/jquery-accordion-menu.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(function(){
            //顶部导航切换
            $("#demo-list li").click(function(){
                $("#demo-list li.active").removeClass("active")
                $(this).addClass("active");
            })
        })
    </script>
    <script type="text/javascript">
        (function($) {
            $.expr[":"].Contains = function(a, i, m) {
                return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
            };
            function filterList(header, list) {
                //@header 头部元素
                //@list 无需列表
                //创建一个搜素表单
                var form = $("<form>").attr({
                    "class":"filterform",
                    action:"#"
                }), input = $("<input>").attr({
                    "class":"filterinput",
                    type:"text"
                });
                $(form).append(input).appendTo(header);
                $(input).change(function() {
                    var filter = $(this).val();
                    if (filter) {
                        $matches = $(list).find("a:Contains(" + filter + ")").parent();
                        $("li", list).not($matches).slideUp();
                        $matches.slideDown();
                    } else {
                        $(list).find("li").slideDown();
                    }
                    return false;
                }).keyup(function() {
                    $(this).change();
                });
            }
            $(function() {
                filterList($("#form"), $("#demo-list"));
            });
        })(jQuery);
    </script>

    <script type="text/javascript">

        jQuery("#jquery-accordion-menu").jqueryAccordionMenu();

    </script>
    <script src="/dist/js/bootstrap.js"></script>
@endsection

@section('content')
    <div class="black">&nbsp;</div>
    <div class="content">
        <div id="jquery-accordion-menu" class="jquery-accordion-menu green">
            <div class="jquery-accordion-menu-header" id="form"></div>
            <ul id="demo-list">
                @foreach($category as $k => $v)
                    @if($v->pid == 0)
                    <li><a href=""><i class="fa fa-home"></i>{{$v->name}}</a>
                        @foreach($category as $key => $value)
                            @if($value->pid == $v->id)
                        <ul class="submenu">
                            <li><a href="{{url('home/category/'.$value->id)}}">{{$value->name}}</a></li>
                        </ul>
                            @endif
                            @endforeach
                    </li>
                    @endif
                @endforeach
            </ul>
            <div class="jquery-accordion-menu-footer">
                Footer
            </div>
        </div>
    </div>
    <!--面包屑导航 开始-->
    　　　　　　　
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        {{--@foreach($book as $key => $value)--}}
        @if($id == 0)
            　　　　<a href="{{url('/home/category')}}">全部</a>
            <hr>
            @else
            @foreach($category as $k => $v)
                @if(!empty($book[0]->c_id))
                @if($v->id == $book[0]->c_id)
                    　　　　<a href="{{url('/home/category')}}">全部</a> &raquo; {{$v->name}}
                    <hr>
                @endif
                @endif
            @endforeach
            @endif

    </div>
    <!--面包屑导航 结束-->

    <div class="books_list">
        @if(empty($book[0]))
            <h3>暂无此分类~~~~~ 敬请期待~~~~~</h3>
            @else
            @foreach($book as $k=>$v)
            <a href="{{url('/home/detail/'.$v->id)}}">
                <div class="books_list01">
                    <img src="{{url('/'.$v->icon)}}" alt="" width="180" height="240">
                    <div class="books_info">
                        <p>{{$v->title}}</p>
                        <span class="left">作者</span>  <span class="right">￥{{$v->price}}</span>
                    </div>
                </div>
            </a>
            @endforeach
            @endif



        <div style="width: 1100px; height: 50px;float: left;">
            <span style="margin-left:700px;">{{$book->links('admin/page')}}</span>
        </div>

    </div>
    {{--<div class="books_rec">--}}
        {{--<img src="{{url('home/img/rec_01.jpg')}}" alt=""><br>--}}
        {{--<img src="{{url('home/img/rec_02.jpg')}}" alt="">--}}
    {{--</div>--}}
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
    
@endsection


