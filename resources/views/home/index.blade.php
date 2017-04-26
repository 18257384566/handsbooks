@extends('layouts/hmaster')
@section('hcss')
    <link rel="stylesheet" href="{{asset('/home/css/index.css')}}">
@endsection
@section('content')
    <!-- ===================================
	轮播图
==================================== -->
    <section class="slider-pro clean-slider" id="clean-slider">
        <div class="sp-slides">

            <!-- Slides -->
            <div class="sp-slide clean-main-slides">
                <div class="clean-img-overlay"></div>

                <img class="sp-image"  src="{{url('home/images/slider/1.jpg')}}" alt="Slider 1"/>

                <h1 class="sp-layer clean-slider-text-big" style="font-size:40px;"
                    data-position="center" data-show-transition="right" data-hide-transition="right" data-show-delay="1500" data-hide-delay="200">
                    <span class="clean-color-contras " style="font-size:40px;color:#7CD552; font-weight: bold; font-family: Webdings;">状元红</span> - 秀_午夜飞行
                </h1>
                <p class="sp-layer"
                   data-position="center" data-vertical="15%" data-show-delay="2000" data-hide-delay="200" data-show-transition="left" data-hide-transition="down">
                    点绛唇 — 倚门回首，却把青梅嗅
                </p>

            </div>
            <!-- Slides End -->

            <!-- Slides -->
            <div class="sp-slide clean-main-slides">
                <div class="clean-img-overlay"></div>
                <img class="sp-image" src="{{url('home/images/slider/2.jpg')}}" alt="Slider 2"/>

                <h1 class="sp-layer clean-slider-text-big"
                    data-position="center" data-show-transition="right" data-hide-transition="right" data-show-delay="1500" data-hide-delay="200">
                    <span class="clean-color-contras" style="color:#84D768; font-size: 50px; font-weight: bold; font-family: Webdings;">鬼帝的御宠毒妃</span> - 墨日西下 著
                </h1>

                <p class="sp-layer"
                   data-position="center" data-vertical="15%" data-show-delay="2000" data-hide-delay="200" data-show-transition="left" data-hide-transition="down">
                    将军府二少爷一个天下人唾弃的废物，姨娘兄长的欺压，人尽皆知的懦夫，公主当众悔婚嘲笑。。。
                </p>
            </div>
            <!-- Slides End -->

            <!-- Slides -->
            <div class="sp-slide clean-main-slides">
                <div class="clean-img-overlay"></div>

                <img class="sp-image" src="{{url('home/images/slider/3.jpg')}}" alt="Slider 3"/>

                <h1 class="sp-layer clean-slider-text-big"
                    data-position="center" data-show-transition="right" data-hide-transition="right" data-show-delay="1500" data-hide-delay="200">
                    <span class="clean-color-contras" style="font-size: 40px; color:#84D768; font-weight: bold; font-family: Webdings;">重生帝女凰途</span> - 樱雨飘零 著
                </h1>

                <p class="sp-layer"
                   data-position="center" data-vertical="15%" data-show-delay="1000" data-hide-delay="200" data-show-transition="left" data-hide-transition="down">
                    “阿玉，你若要这天下，我定呕心沥血为你送上。”上一世他的誓言犹在耳。重活一次，她誓死也要保护她爱的和爱她的人！
                </p>

            </div>
            <!-- Slides End -->

        </div>
    </section>
    {{--留白--}}
    <div class="black"></div>

    {{--广告--}}
    <div class="container">
         <div>
             <img src="" alt="">
         </div>

    </div>
    {{--广告结束--}}
        <h2>&nbsp;</h2>
    {{--热销作品--}}
    <div class="container">
        <h3 class="agileits-title">热销作品</h3>
        <div class="rows">

            <div class="rx">
                @foreach($top_list as $k => $v)
                    <div class="col-md-3 hot">
                        <div class="hot-img"></div>
                        <div class="col-md-5 hot-img">
                            <a href="{{url('/home/detail/'.$v->id)}}"><img src="/{{$v->icon}}" alt="" width="100"></a>
                        </div>
                        <div class="col-md-7" style="margin-top:20px;">
                            <div class="black"></div>
                            <div class="black"></div>
                            <p><a href="">{{$v->title}}</a></p>
                            <p>作者:{{$v->name}}</p>
                            <p>价格：￥{{$v->price}}</p>
                        </div>
                    </div>
                    @endforeach
            </div>

        </div>
        {{--热销作品结束--}}
<h2>&nbsp;</h2>
        {{--新书上线--}}
        <div class="contain">
            <div class="black"></div>
            <div class="black"></div>
            <div class="black"></div>
            <h3 class="agileits-title">新书上线</h3>
            @foreach($new as $k => $v)
                <div class="rows">
                    <div class="col-md-2 new-book" style="margin-top: 30px;">
                        <a href="{{url('/home/detail/'.$v->id)}}"><img src="/{{$v->icon}}" alt="" width="100" height="125"></a>
                        <div class="black"></div>
                        <br>
                        <p>￥{{$v->price}}</p>
                    </div>
                </div>
                @endforeach

        </div>
    {{--新书上线--}}
    <h2>&nbsp;</h2>
    </div>

    {{--作者--}}
    <div class="container">
        <h3 class="agileits-title">人气作家</h3>
        <div class="rows">
            @foreach($auth as $k => $v)
                <div class="col-md-3 agile_team_grid">
                    <div class="ih-item circle effect1">
                        <div class="spinner"></div>
                        <div class="img"><img src="/{{$v->icon}}" alt=" " class="img-responsive"></div>
                        <div class="info">
                            <div class="info-back">
                                <h4>{{$v->name}}</h4>
                                <p>青春小说</p>
                            </div>
                        </div>
                    </div>
                    <h4>{{$v->name}}</h4>
                    @foreach($book as $key => $value)
                        @if($key == $v->id)
                        @foreach($value as $a => $b)
                    <h6><a href="">《{{$b->title}}》</a><br></h6>
                        @endforeach
                        @endif
                        @endforeach
                </div>
            @endforeach
        </div>
    </div>
    {{--end作者--}}

@endsection

@section('j-s')
    <!-- smooth scrolling -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
             var defaults = {
             containerID: 'toTop', // fading element id
             containerHoverID: 'toTopHover', // fading element hover id
             scrollSpeed: 1200,
             easingType: 'linear'
             };
             */
            $().UItoTop({ easingType: 'easeOutQuart' });
        });
    </script>
    <!-- //smooth scrolling -->
@endsection
