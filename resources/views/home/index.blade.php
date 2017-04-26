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

            @foreach($result as $item)
                <!-- Slides -->
                <div class="sp-slide clean-main-slides">
                    <div class="clean-img-overlay"></div>

                    <img class="sp-image"  src="/slide_icon/{{$item->icon}}" alt="Slider 1"/>

                    <h1 class="sp-layer clean-slider-text-big" style="font-size:40px;"
                        data-position="center" data-show-transition="right" data-hide-transition="right" data-show-delay="1500" data-hide-delay="200">
                        <span class="clean-color-contras " style="font-size:40px;color:#7CD552; font-weight: bold; font-family: Webdings;">{{$item->b_name}}</span> - {{$item->a_name}}
                    </h1>
                    <p class="sp-layer"
                       data-position="center" data-vertical="15%" data-show-delay="2000" data-hide-delay="200" data-show-transition="left" data-hide-transition="down">
                        {{$item->desc}}
                    </p>

                </div>
                <!-- Slides End -->
            @endforeach


        </div>
    </section>



    <div style="margin-top:-20px; margin-bottom: 15px;">
        <div class="container">
            <div class="rows">
                <div class="col-md-3">
                    <select class="form-control" id="xz">
                        <option value="白羊座">白羊座</option>
                        <option value="金牛座">金牛座</option>
                        <option value="双子座" selected>双子座</option>
                        <option value="巨蟹座">巨蟹座</option>
                        <option value="处女座">处女座</option>
                        <option value="天秤座">天秤座</option>
                        <option value="天蝎座">天蝎座</option>
                        <option value="射手座" >射手座</option>
                        <option value="摩羯座">摩羯座</option>
                        <option value="水瓶座">水瓶座</option>
                        <option value="双鱼座">双鱼座</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <button class="btn btn-success selected">查询</button>
                </div>
            </div>
        </div>
    </div>

    </div>




    {{--留白--}}
    <div class="black"></div>
    {{--热销作品--}}
    <div class="container">
        <h3 class="agileits-title">热销作品</h3>
        <div class="rows">

            <div class="rx">
                @for($i=0;$i<4;$i++)
                <div class="col-md-3 hot">
                    {{--<div class="hot-img"></div>--}}
                    <div class="col-md-5 hot-img">
                        <a href=""><img src="{{url('home/image/180.jpg')}}" alt="" width="100"></a>
                    </div>
                    <div class="col-md-7" style="margin-top:20px;">
                        <div class="black"></div>
                        <div class="black"></div>
                        <p><a href="">婚途有坑：前妻有喜了</a></p>
                        <p>作者:豆丁丁</p>
                        <p>价格：￥2.00</p>
                    </div>
                </div>
                @endfor
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
            <div class="rows">
                <div class="col-md-2 new-book">
                    <a href=""><img src="{{url('home/image/180.jpg')}}" alt="" width="100"></a>
                    <div class="black"></div>
                    <p>￥3.00</p>
                </div>
            </div>
            <div class="rows">
                <div class="col-md-2 new-book">
                    <a href=""><img src="{{url('home/image/180.jpg')}}" alt="" width="100"></a>
                    <div class="black"></div>
                    <p>￥3.00</p>
                </div>
            </div>
            <div class="rows">
                <div class="col-md-2 new-book">
                    <a href=""><img src="{{url('home/image/180.jpg')}}" alt="" width="100"></a>
                    <div class="black"></div>
                    <p>￥3.00</p>
                </div>
            </div>
            <div class="rows">
                <div class="col-md-2 new-book">
                    <a href=""><img src="{{url('home/image/180.jpg')}}" alt="" width="100"></a>
                    <div class="black"></div>
                    <p>￥3.00</p>
                </div>
            </div>
            <div class="rows">
                <div class="col-md-2 new-book">
                    <a href=""><img src="{{url('home/image/180.jpg')}}" alt="" width="100"></a>
                    <div class="black"></div>
                    <p>￥3.00</p>
                </div>
            </div>
            <div class="rows">
                <div class="col-md-2 new-book">
                    <a href=""><img src="{{url('home/image/180.jpg')}}" alt="" width="100"></a>
                    <div class="black"></div>
                    <p>￥3.00</p>
                </div>
            </div>
            <div class="rows">
                <div class="col-md-2 new-book">
                    <a href=""><img src="{{url('home/image/180.jpg')}}" alt="" width="100"></a>
                    <div class="black"></div>
                    <p>￥3.00</p>
                </div>
            </div>
            <div class="rows">
                <div class="col-md-2 new-book">
                    <a href=""><img src="{{url('home/image/180.jpg')}}" alt="" width="100"></a>
                    <div class="black"></div>
                    <p>￥3.00</p>
                </div>
            </div>
            <div class="rows">
                <div class="col-md-2 new-book">
                    <a href=""><img src="{{url('home/image/180.jpg')}}" alt="" width="100"></a>
                    <div class="black"></div>
                    <p>￥3.00</p>
                </div>
            </div>
            <div class="rows">
                <div class="col-md-2 new-book">
                    <a href=""><img src="{{url('home/image/180.jpg')}}" alt="" width="100"></a>
                    <div class="black"></div>
                    <p>￥3.00</p>
                </div>
            </div>
            <div class="rows">
                <div class="col-md-2 new-book">
                    <a href=""><img src="{{url('home/image/180.jpg')}}" alt="" width="100"></a>
                    <div class="black"></div>
                    <p>￥3.00</p>
                </div>
            </div>
            <div class="rows">
                <div class="col-md-2 new-book">
                    <a href=""><img src="{{url('home/image/180.jpg')}}" alt="" width="100"></a>
                    <div class="black"></div>
                    <p>￥3.00</p>
                </div>
            </div>
        </div>
    {{--新书上线--}}
    <h2>&nbsp;</h2>
    </div>

    {{--作者--}}
    <div class="container">
        <h3 class="agileits-title">人气作家</h3>
        <div class="rows">
            @for($i=0; $i<4; $i++)
                <div class="col-md-3 agile_team_grid">
                    <div class="ih-item circle effect1">
                        <div class="spinner"></div>
                        <div class="img"><img src="{{url('home/image/zuo1.jpg')}}" alt=" " class="img-responsive"></div>
                        <div class="info">
                            <div class="info-back">
                                <h4>顾漫</h4>
                                <p>青春小说</p>
                            </div>
                        </div>
                    </div>
                    <h4>顾漫</h4>
                    <h6><a href="">《何以笙箫默》</a><br> <a href="">《微微一笑很倾城》</a> <br> <a href="">《杉杉来吃》</a></h6>
                </div>
            @endfor
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

            //星座
            $('.selected').click(function(){
                var $xz = $('#xz').children('option:selected').val();
                location.href = "/home/jk?xz="+$xz;
            })


        });
    </script>
    <!-- //smooth scrolling -->
@endsection
