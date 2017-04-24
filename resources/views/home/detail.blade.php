@extends('layouts/hmaster')
@section('title','详情')
@section('hcss')
    <link href="/home/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('home/css/detail.css')}}">
    <link rel="stylesheet" href="{{url('home/css/top_list.css')}}">
    <link rel="stylesheet" href="{{url('home/tk/css/xcConfirm.css')}}">
    <style>
        .content{margin-top:20px;}
        .black{width: 100%; height:auto; background-image: url('/home/image/cate.jpg'); magin:0 auto; height: 189px;}
        .books_rec{margin-top: -242px;}
        .xcConfirm .popBox{
            width: 500px;
            height: 600px;
        }
        /*.xcConfirm .popBox .btnArea{*/
            /*margin-top:350px;*/
        /*}*/
        .xcConfirm .popBox{
            margin-top:-300px;
        }
        .xcConfirm .popBox .txtBox p{
            width: 400px;
            height: 600px;
            margin-left:0px;
        }
        .xcConfirm .popBox .txtBox p span{
            float:left;
        }
        .xcConfirm .popBox .txtBox p .b_name{
            margin-left:20px;
            margin-top:10px;
        }
        .xcConfirm .popBox .txtBox p .car_info{
            float:right;
            width:320px;
            height:100px;
            background-color: #FAFAF7;
            /*margin-right:20px;*/
        }
        .xcConfirm .popBox .txtBox p img{
            margin-top:15px;
            margin-left:15px;
            float:left;
        }
        .xcConfirm .popBox .txtBox{
            width: 400px;
            height: 420px;
            margin-left:30px;
            margin-top:20px;
        }

    </style>
@endsection
@section('js')
    <script src="{{url('home/tk/js/jquery-1.9.1.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{url('home/tk/js/xcConfirm.js')}}" type="text/javascript" charset="utf-8"></script>
    @endsection
@section('j-s')
    <script type="text/javascript" src="{{url('home/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('home/js/j-accordin.min.js')}}"></script>
    <script src="/home/js/bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.accordion').jaccordion();
            $("#btn7").click(function(){
                var $img = $(".big_img img").attr("src");
                var $book_name = $(".book_name").html();
                var $price_money = $(".price_money").html();
                var txt=  "<div style='width: 400px;height: 100px; '><span>购买图书:</span><div class='car_info'><img src="+$img+" width='50px' height='70px'><span class='b_name'>"+$book_name+"</span></div></div>" +
                    "<br>"+
                    "<div style='width: 400px;height: 60px; '><span>图书价格:</span><span style='margin-left:20px'>"+$price_money+"</span></div>" +
                    "<br>" +
                    "<div style='width: 400px;height: 60px; '><span>支付方式:</span><div class='car_info'><span class='b_name'>微信　支付宝</span></div></div>";
                var option = {
                    title: "购买图书",
                    btn: parseInt("0011",2),
                    onOk: function(){
                         $.ajax({
                             url:'/home/detail/orderAdd',
                             type:'post',
                             data:{
                                 '_token':$("input[name='_token']").val(),
                                 'price':$price_money,
                                 'books_id':$("input[name='books_id']").val()
                             },
                             success:function(data){
//                                 alert(data);
                                  if(data){
                                      var txt=  "亲！您要现在确认付款吗";
                                      var option = {
                                          title: "付款",
                                          btn: parseInt("0011",2),
                                          onOk: function(){
                                              $.ajax({
                                                  url:'/home/detail/isPay',
                                                  type:'post',
                                                  data:{
                                                      '_token':$("input[name='_token']").val(),
                                                      'id':data,
                                                  },
                                                  success:function(data){
//                                                      alert(data);
                                                      if(data == 1){
                                                          var txt=  "付款成功";
                                                          window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.success);
                                                      }else{
                                                          var txt=  "付款失败";
                                                          window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.error);
                                                      }
                                                  },
                                                  error:function(){
                                                      var txt=  "付款失败";
                                                      window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.error);
                                                  }
                                              })
                                          }
                                      }
                                      window.wxc.xcConfirm(txt, "custom", option);
                                  }else{
                                      var txt=  "下单失败";
                                      window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.error);
                                  }
                             },
                             error:function(){
                                 alert('false');
                             }

                         })
                    }
                };
                window.wxc.xcConfirm(txt, "custom", option);
            });

        });
    </script>
@endsection
@section('content')
    <div class="black">&nbsp;</div>
<div class="clear">
    {{csrf_field()}}
    <input type="hidden" name="books_id" value="{{$id}}">
    <div class="details_book clear">
        <div class="big_img clear">
            <img src="{{url('/'.$book->icon)}}" alt=""    width="297px"  height="396px">
        </div>
        <div class="books_info clear">
            <span class="book_name">{{$book->title}}</span><img src="/home/img/X11.png" alt="">
        </div>
        <div class="book_pop clear">
            <div class="xzw_starBox clear">
                <ul class="star" id="star">
                    <li><a href="javascript:void(0)" title="1" class="one-star">1</a></li>
                    <li><a href="javascript:void(0)" title="2" class="two-stars">2</a></li>
                    <li><a href="javascript:void(0)" title="3" class="three-stars">3</a></li>
                    <li><a href="javascript:void(0)" title="4" class="four-stars">4</a></li>
                    <li><a href="javascript:void(0)" title="5" class="five-stars">5</a></li>
                </ul>
            </div>
            <div class="books_stars clear">
                <span class="book_score">9.6</span>(<span class="book_num">2340</span>人评论)　|　<span class="read_num">12345</span>人阅读
            </div>
        </div>
        <div class="book_author">
            <span>作　者：<span>书海沧生</span></span><br>
            <span>出版社：<span>{{$book->name}}</span></span>　　　　　　　　　
            @if($collect == 1)
            <a href="{{url('/home/detail/collect_no/'.$id)}}" class="btn btn-info collect"><span class="glyphicon glyphicon-heart " aria-hidden="true"></span>已收藏</a>
            @else
            <a href="{{url('/home/detail/collect_ok/'.$id)}}" class="btn btn-info collect"><span class="glyphicon glyphicon-heart " aria-hidden="true"></span>收藏</a>
            @endif
        </div>
        <div class="book_price clear">
            <div class="price_title clear">
                <span class="price_title_left">全网最低</span><span class="price_title_right"> 百度阅读已为您全网比价</span>
            </div>
            <div class="price_price clear">
                <span>价格: <span style="color:#F87A36;font-size:20px">￥</span><span class="price_money">{{$book->price}}</span>
            </div>
            <div class="price_button clear">
                <button class="button_buy" id="btn7">购买全本</button>
                　<a href="" class="button_read">开始阅读</a>
            </div>
        </div>
    </div>
    <!-- 标签页开始 -->
    <div class="book_detail clear">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs clear" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">简介</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">目录</a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">评论（4625）</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content clear">
            <div role="tabpanel" class="tab-pane active" id="home">
                <div class="row">
                    <div class="col-md-9" style="margin-left:80px">
                        <h4>图书简介</h4>
                        <p>{{$desc}}</p>

                        <h4>作者简介</h4>
                        <p>青春文学超级畅销书作家。处女作《十年一品温如言》出版后引发千万读者追捧，粉丝团自号“排骨”。该书因其好口碑连续6年成为豆瓣评分最高的青春小说之一，总销量已逾百万册，并输出影视版权，即将引发新的一轮“十年热”！  其后，华丽古言奇幻大作《昭奚旧草》一经上市，好评如潮，被读者公认为书海沧生的又一代表作。</p>

                        <hr>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
                <div class="row">
                    <div class="col-md-9" style="margin-left:80px">
                        <h4><b>目录(共119章)</b></h4>
                        <hr>
                        @if(!empty($book_info[0]))
                            @foreach($book_info as $k => $v)
                                   <p>{{$v->title}}</p>
                            @endforeach
                            @else
                            ...
                        @endif
                    </div>
                    <div style="width: 300px;height: 200px;"></div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="messages">
                <div class="row">
                    <div class="col-md-9" style="margin-left:80px">
                        <h4><b>图书评论</b></h4>
                        <hr>
                        <div class="center_comm">
                            <span class="center_title">综合评论</span>
                            <div class="xzw_starBox xzw_starBox_comm ">
                                <ul class="star" id="star">
                                    <li><a href="javascript:void(0)" title="1" class="one-star">1</a></li>
                                    <li><a href="javascript:void(0)" title="2" class="two-stars">2</a></li>
                                    <li><a href="javascript:void(0)" title="3" class="three-stars">3</a></li>
                                    <li><a href="javascript:void(0)" title="4" class="four-stars">4</a></li>
                                    <li><a href="javascript:void(0)" title="5" class="five-stars">5</a></li>
                                </ul>
                            </div>
                            <span class="comm_score">8</span>
                            <hr>

                            <span>共有{{$num}}条评论</span>
                            <br>
                            <br>
                            <br>
                            @if(!empty($comment[0]))
                                @foreach($comment as $k=>$v)
                                <div class="user_comm clear">
                                    <div class="user_icon clear">
                                        <img src="/{{$v->icon}}" alt="" width="50" height="50">
                                    </div>
                                    <div class="comm_info clear">
                                        <span>{{$v->name}}</span>　　　　　　　　　<span>{{$v->created_at}}</span>
                                        <br>
                                        <br>
                                        <span>
                                                　　{{$v->comment}}
                                            </span>
                                    </div>
                                </div>
                                 <hr>
                                @endforeach
                                @else
                                <div class="user_comm clear" style="width: 300px;height: 200px;">
                                    <div class="comm_info clear">
                                 <span>暂无评论</span>
                                    </div>
                                </div>
                                <hr>
                            @endif
                        </div>



                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="top_list clear">
        <h4 style="margin-left:20px;">热门榜单</h4>
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
@endsection