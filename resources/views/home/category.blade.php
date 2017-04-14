@extends('layouts/hmaster')
@section('title','分类')
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
            margin-top:10px
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
                <li class="active"><a href="#"><i class="fa fa-home"></i>小说 </a>
                    <ul class="submenu">
                        <li><a href="#">言情</a></li>
                        <li><a href="#">青春 </a></li>
                        <li><a href="#">都市 </a>
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
                <li><a href="#"><i class="fa fa-glass"></i>经济管理</a>
                    <ul class="submenu">
                        <li><a href="#">企业管理</a></li>
                        <li><a href="#">经济金融</a></li>
                        <li><a href="#">投资理财</a></li>
                        <li><a href="#">市场营销</a></li>
                        <li><a href="#">财会统计</a></li>
                        <li><a href="#">通俗读物</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-file-image-o"></i>成功励志</a>
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
                <li><a href="#"><i class="fa fa-cog"></i>历史传记</a>
                    <ul class="submenu">
                        <li><a href="#">Web Design </a></li>
                        <li><a href="#">Hosting </a></li>
                        <li><a href="#">Design </a>
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
                <li><a href="#"><i class="fa fa-suitcase"></i>两性情感</a>
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
            <div class="jquery-accordion-menu-footer">
                Footer
            </div>
        </div>
    </div>
    <ol class="breadcrumb">
        <li><a href="#">　　百度阅读</a></li>
        <li><a href="#">全部图书</a></li>
        <li class="active">Data</li>
    </ol>

    <div class="books_list">
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

    <div class="books_rec">
        <img src="{{url('home/img/rec_01.jpg')}}" alt=""><br>
        <img src="{{url('home/img/rec_02.jpg')}}" alt="">
    </div>
    <h2></h2>
@endsection


