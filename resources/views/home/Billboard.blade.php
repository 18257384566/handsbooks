@extends('layouts.hmaster')
@section('hcss')
    <link href="/home/css/jquery-accordion-menu.css" rel="stylesheet" type="text/css" />
    <link href="/home/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="/dist/css/bootstrap.css" rel="stylesheet">
    <style>
        .container{margin-top: 0px;}
        .content{margin-top:20px;}
        .black{width: 100%; height:auto; background-image: url('/home/image/cate.jpg'); magin:0 auto; height: 189px;}
        .books_rec{margin-top: -242px;}

        .books_list01{float: left; margin-left:26px; margin-bottom: 30px;}
    </style>
@endsection
@section('style')
    <link rel="stylesheet" href="/home/css/category.css">
@endsection
@section('script')
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
@endsection
@section('content')
    <div class="black"></div>
    <h2>&nbsp;</h2>
    <div class="container">
        <div class="rows">
            <div class="col-md-3">


        <div id="jquery-accordion-menu" class="jquery-accordion-menu green">
            <div class="jquery-accordion-menu-header" id="form"></div>
            <ul id="demo-list">
                <li class="active"><a href="#"><i class="fa fa-home"></i>排行榜 </a></li>
                <li><a href="#"><i class="fa fa-glass"></i>畅销榜</a></li>
                <li><a href="#"><i class="fa fa-file-image-o"></i>新书榜</a></li>
                <li><a href="#"><i class="fa fa-cog"></i>热搜榜</a></li>
                <li><a href="#"><i class="fa fa-home"></i>点击榜</a></li>
            </ul>
            <div class="jquery-accordion-menu-footer">
                Footer
            </div>
        </div>
        </div>
        </div>
        <div class="col-md-9">
            <div class="books_list">
                <h3>畅销榜</h3>
                <hr>
                <div class="books_list01">
                    <img src="{{url('home/img/y-01.jpg')}}" alt="" width="180" height="240">
                    <div class="books_info">
                        <p>十年一品，温如言</p>
                        <span class="left">作者</span>  <span class="right">￥12.2</span>
                    </div>
                </div>
                <div class="books_list01">
                    <img src="{{url('home/img/y-01.jpg')}}" alt="" width="180" height="240">
                    <div class="books_info">
                        <p>十年一品，温如言</p>
                        <span class="left">作者</span>  <span class="right">￥12.2</span>
                    </div>
                </div>
                <div class="books_list01">
                    <img src="{{url('home/img/y-01.jpg')}}" alt="" width="180" height="240">
                    <div class="books_info">
                        <p>十年一品，温如言</p>
                        <span class="left">作者</span>  <span class="right">￥12.2</span>
                    </div>
                </div>
                <div class="books_list01">
                    <img src="{{url('home/img/y-01.jpg')}}" alt="" width="180" height="240">
                    <div class="books_info">
                        <p>十年一品，温如言</p>
                        <span class="left">作者</span>  <span class="right">￥12.2</span>
                    </div>
                </div>
                <div class="books_list01">
                    <img src="{{url('home/img/y-01.jpg')}}" alt="" width="180" height="240">
                    <div class="books_info">
                        <p>十年一品，温如言</p>
                        <span class="left">作者</span>  <span class="right">￥12.2</span>
                    </div>
                </div>
                <div class="books_list01">
                    <img src="{{url('home/img/y-01.jpg')}}" alt="" width="180" height="240">
                    <div class="books_info">
                        <p>十年一品，温如言</p>
                        <span class="left">作者</span>  <span class="right">￥12.2</span>
                    </div>
                </div>
                <div class="books_list01">
                    <img src="{{url('home/img/y-01.jpg')}}" alt="" width="180" height="240">
                    <div class="books_info">
                        <p>十年一品，温如言</p>
                        <span class="left">作者</span>  <span class="right">￥12.2</span>
                    </div>
                </div>
                <div class="books_list01">
                    <img src="{{url('home/img/y-01.jpg')}}" alt="" width="180" height="240">
                    <div class="books_info">
                        <p>十年一品，温如言</p>
                        <span class="left">作者</span>  <span class="right">￥12.2</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--<div class="books_rec">--}}
    {{--<img src="{{url('home/img/rec_01.jpg')}}" alt=""><br>--}}
    {{--<img src="{{url('home/img/rec_02.jpg')}}" alt="">--}}
    {{--</div>--}}
@endsection
@section('j-s')
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
@endsection
