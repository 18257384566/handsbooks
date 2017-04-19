@extends('layouts/hmaster')
@section('title','详情')
@section('hcss')
    <link href="/home/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('home/css/detail.css')}}">
    <link rel="stylesheet" href="{{url('home/css/top_list.css')}}">
    <style>
        .content{margin-top:20px;}
        .black{width: 100%; height:auto; background-image: url('/home/image/cate.jpg'); magin:0 auto; height: 189px;}
        .books_rec{margin-top: -242px;}
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
    <div class="black">&nbsp;</div>
<div class="clear">

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
        </div>
        <div class="book_price clear">
            <div class="price_title clear">
                <span class="price_title_left">全网最低</span><span class="price_title_right"> 百度阅读已为您全网比价</span>
            </div>
            <div class="price_price clear">
                <span>价格: <span class="price_money">￥{{$book->price}}</span>
            </div>
            <div class="price_button clear">
                <a href="" class="button_buy">购买全本</a>　<a href="" class="button_read">开始阅读</a>
            </div>
            <a href="" class="price_car">加入购物车</a>
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
                        <p>{{$book->desc}}</p>

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
                        　<h4>楔子</h4>
                        <p>Chapter 1一盆水从天而降</p>
                        <p>Chapter 2这个枝头不留娘</p>
                        <p>Chapter 3EVE曾叫辛达夷</p>
                        <p>Chapter 4有个炸弹唤思尔</p>
                        <p>Chapter 5桃花梦中桃花少</p>
                        <p>Chapter 1一盆水从天而降</p>
                        <p>Chapter 2这个枝头不留娘</p>
                        <p>Chapter 3EVE曾叫辛达夷</p>
                        <p>Chapter 4有个炸弹唤思尔</p>
                        <p>Chapter 5桃花梦中桃花少</p>
                        <p>Chapter 1一盆水从天而降</p>
                        <p>Chapter 2这个枝头不留娘</p>
                        <p>Chapter 3EVE曾叫辛达夷</p>
                        <p>Chapter 4有个炸弹唤思尔</p>
                        <p>Chapter 5桃花梦中桃花少</p>
                        <p>Chapter 1一盆水从天而降</p>
                        <p>Chapter 2这个枝头不留娘</p>
                        <p>Chapter 3EVE曾叫辛达夷</p>
                        <p>Chapter 4有个炸弹唤思尔</p>
                        <p>Chapter 5桃花梦中桃花少</p>
                        <p>Chapter 1一盆水从天而降</p>
                        <p>Chapter 2这个枝头不留娘</p>
                        <p>Chapter 3EVE曾叫辛达夷</p>
                        <p>Chapter 4有个炸弹唤思尔</p>
                        <p>Chapter 5桃花梦中桃花少</p>
                        <p>Chapter 1一盆水从天而降</p>
                        <p>Chapter 2这个枝头不留娘</p>
                        <p>Chapter 3EVE曾叫辛达夷</p>
                        <p>Chapter 4有个炸弹唤思尔</p>
                        <p>Chapter 5桃花梦中桃花少</p>
                        <p>Chapter 1一盆水从天而降</p>
                        <p>Chapter 2这个枝头不留娘</p>
                        <p>Chapter 3EVE曾叫辛达夷</p>
                        <p>Chapter 4有个炸弹唤思尔</p>
                        <p>Chapter 5桃花梦中桃花少</p>
                    </div>
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
                            <span共有2345条评论</span>
                            <div class="user_comm clear">
                                <div class="user_icon clear">
                                    <img src="{{url('home/img/y-01.jpg')}}" alt="" width="50" height="50">
                                </div>
                                <div class="comm_info clear">
                                    <span>用户名</span>　　　　　　　　　<span>评论时间</span>
                                    <br>
                                    <br>
                                    <span>
                                            　　云横秦岭家何在，十年一品温如言。 用时间镌刻出来的一切，都太美太美。 阿衡说，对言希一见钟情，是她做过的最不理智的事情。 可是阿衡，没有你那一刻的不理智，就不会有言希温衡这样白首不分离的爱情啊。
                                        </span>
                                </div>
                            </div>
                            <hr>
                            <div class="user_comm clear">
                                <div class="user_icon clear">
                                    <img src="{{url('home/img/y-01.jpg')}}" alt="" width="50" height="50">
                                </div>
                                <div class="comm_info clear">
                                    <span>用户名</span>　　　　　　　　　<span>评论时间</span>
                                    <br>
                                    <br>
                                    <span>
                                            　　云横秦岭家何在，十年一品温如言。 用时间镌刻出来的一切，都太美太美。 阿衡说，对言希一见钟情，是她做过的最不理智的事情。 可是阿衡，没有你那一刻的不理智，就不会有言希温衡这样白首不分离的爱情啊。
                                        </span>
                                </div>
                            </div>
                            <hr>
                            <div class="user_comm clear">
                                <div class="user_icon clear">
                                    <img src="{{url('home/img/y-01.jpg')}}" alt="" width="50" height="50">
                                </div>
                                <div class="comm_info clear">
                                    <span>用户名</span>　　　　　　　　　<span>评论时间</span>
                                    <br>
                                    <br>
                                    <span>
                                            　　云横秦岭家何在，十年一品温如言。 用时间镌刻出来的一切，都太美太美。 阿衡说，对言希一见钟情，是她做过的最不理智的事情。 可是阿衡，没有你那一刻的不理智，就不会有言希温衡这样白首不分离的爱情啊。
                                        </span>
                                </div>
                            </div>
                            <hr>
                            <div class="user_comm clear">
                                <div class="user_icon clear">
                                    <img src="{{url('home/img/y-01.jpg')}}" alt="" width="50" height="50">
                                </div>
                                <div class="comm_info clear">
                                    <span>用户名</span>　　　　　　　　　<span>评论时间</span>
                                    <br>
                                    <br>
                                    <span>
                                            　　云横秦岭家何在，十年一品温如言。 用时间镌刻出来的一切，都太美太美。 阿衡说，对言希一见钟情，是她做过的最不理智的事情。 可是阿衡，没有你那一刻的不理智，就不会有言希温衡这样白首不分离的爱情啊。
                                        </span>
                                </div>
                            </div>
                            <hr>
                            <div class="user_comm clear">
                                <div class="user_icon clear">
                                    <img src="{{url('home/img/y-01.jpg')}}" alt="" width="50" height="50">
                                </div>
                                <div class="comm_info clear">
                                    <span>用户名</span>　　　　　　　　　<span>评论时间</span>
                                    <br>
                                    <br>
                                    <span>
                                            　　云横秦岭家何在，十年一品温如言。 用时间镌刻出来的一切，都太美太美。 阿衡说，对言希一见钟情，是她做过的最不理智的事情。 可是阿衡，没有你那一刻的不理智，就不会有言希温衡这样白首不分离的爱情啊。
                                        </span>
                                </div>
                            </div>
                            <hr>
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