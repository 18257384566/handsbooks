@extends('layouts/hmaster')
@section('title','个人中心')
@section('hcss')
    <link rel="stylesheet" href="{{url('home/css/spaceMaster.css')}}">
    <link rel="stylesheet" href="{{url('/home/css/authInfo.css')}}">
    <link rel="stylesheet" href="{{url('home/css/top_list.css')}}">
    <link rel="stylesheet" href="{{url('/home/css/auth.css')}}">
    <style>
        .tabs input:checked + label {
            background: #CFCFCE;
        }
        .tabs label {
            width:120px;
            background: -webkit-linear-gradient(top, #84D664 0%,#84D664 100%);
        }
        .content {
            margin-top:-740px;
            width:890px;
        }
        .tabs{
            margin-top:95px;
            margin-left:0px;
        }

        *{ margin: 0; padding: 0}
        ul,li{ list-style: none}
        #wrap{
            width: 800px;
        }
        .tabClick{ background: #f3f3f3; overflow: hidden}
        .tabClick li{ height:40px; line-height: 40px; width: 25%; float: left; text-align: center}
        .tabClick li.active{ color: #099; transition: 0.1s; font-weight: bold}
        .tabCon{ overflow: hidden}
        .tabBox{ position: relative}
        .tabList{word-break: break-all; width:100%;float:left; color:dimgrey; }
        .lineBorder{ height: 2px; overflow: hidden; border-bottom:1px solid #099; background: #f3f3f3}
        .lineDiv{ background: #099; height: 2px; width: 25%;}

        #wrap {margin-top:96px;}

        .tabList table tr{height:60px;}



    </style>
@endsection

@section('content')
    {{--大图--}}
    <div class="head-img">
        <img src="{{url('home/image/space.jpg')}}" alt="" width="100%">
    </div>
    {{--结束大图--}}
    <div class="sidebar">
        <ul>
            <li>
                <img src="/{{$users->icon}}"
                     alt="" width="100px" height="100px" style="border-radius: 50%">
                <p>{{$users->name}}</p>
            </li>
            <li>
                <a href=""><h4>个人信息</h4></a>
            </li>
            <li>
                <a href="{{url('home/space/user')}}"><h4>个人信息</h4></a>
            </li>
            <li>
                <a href="{{url('home/space/order/1')}}"><h4>我的订单</h4></a>
            </li>
            <li>
                <a href="{{asset('home/focus')}}"><h4>我的关注</h4></a>
            </li>
            {{--@if($a_id)--}}
            <li>
                <a href="/home/authSpace/{{$a_id}}"><h4>作者space</h4></a>
            </li>
            {{--@endif--}}
            <li></li>
        </ul>
    </div>
    <div class="main">
        @yield('main')

        <div class="container">
            <div class="rows">
                <div class="col-md-12">
                    <h2>&nbsp;</h2>
                    <ul>

                    @foreach($aids as $item)
                            @if(empty($item->auth_id))
                                <h2>您当前尚未关注任何作者</h2>
                            @endif
                        <?php
                            //                                for ($i=0;$i++;$i<5){
                            $a_id = $item->auth_id;
                            $result = DB::select('select a.id, a.detail, a.focus, ui.icon,u.name from users as u, auths as a, users_info as ui where a.u_id = u.id and u.id=ui.u_id and a.id = '.$a_id);
//                            dump($result);
                            foreach ($result as $k):
//                                dump($k);
                            ?>

                            <li>
                                <div class="col-md-3 agile_team_grid">
                                    <div class="ih-item circle effect1">
                                        <div class="spinner"></div>
                                        <div class="img"><img src="/{{$k->icon}}" alt=" " class="img-responsive"></div>
                                        <a href="authInfo/"><div class="info">
                                                <div class="info-back">
                                                    <h4>{{$k->name}}</h4>
                                                    <p>青春小说</p>
                                                </div>
                                            </div></a>
                                    </div>
                                    <h4 ><p style="display: none;">{{$k->id}}</p>
                                        <button class="btn btn-warning delf">取消关注</button>
                                    </h4>
                                    {{--<div class="ff">--}}
                                    {{--<div class="ff" style="display:block;white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">--}}
                                    <div class="ff" style="  white-space: nowrap; overflow:hidden; text-overflow:ellipsis; ">
                                        <p>{{$k->detail}}</p>
                                        <p>代表作品：《微微一笑很倾城》</p>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        @endforeach


                    </ul>
                </div>
            </div>
        </div>

    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection

@section('j-s')
    <script>
        $(function(){
            //取消关注
            $('.delf').click(function(){
                $id = $(this).parent().children(':first').html();
                $.get('/home/delfocus',{'a_id':$id },function(data){
                    alert(data);
                });
                $(this).parent().parent().css('display','none');
            });

            $.ajax({
                url:'/admin/book/cate',
                type:'get',
                data:{
                    '_token':'{{csrf_token()}}'
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
//                    alert(data);
                    var boss = document.getElementById('boss');
                    var son = document.getElementById('son');
                    for(var i in data){
                        if(data[i].path == '0,'){
//                            alert(data[i].id);
//                            boss.add(new Option(data[i].name,data[i].id));

                            $("#boss").append("<option value='"+data[i].id+"'>"+data[i].name+"</option>");
                        }
                    }

                    //然后根据省份的选择决定 城市和区的显示内容
                    boss.onchange = function(){
                        //将之前的清空
                        son.length = 0;
                        var index = boss.value;

                        for(var j in data){

                            if(data[j].pid == index){
//                                son.add(new Option(data[j].name,data[j].id));

                                $("#son").append("<option value='"+data[j].id+"'>"+data[j].name+"</option>");
                            }
                        }
                    }


                    //在页面载入完成后 自动触发一次选择
                    boss.onchange();
                },
                error:function(){

                },
                dataType:'json',
                async: false
            });

            //创作（写章节）
            $('.make').click(function(){
                $id = $(this).parent().children('p').last().html();
//                alert($id);
                location.href = "/home/write/"+$id;
            })

        })

        {{--===============================--}}
            window.onload = function (){
            var windowWidth = document.body.clientWidth; //window 宽度;
            var wrap = document.getElementById('wrap');
            var tabClick = wrap.querySelectorAll('.tabClick')[0];
            var tabLi = tabClick.getElementsByTagName('li');

            var tabBox =  wrap.querySelectorAll('.tabBox')[0];
            var tabList = tabBox.querySelectorAll('.tabList');

            var lineBorder = wrap.querySelectorAll('.lineBorder')[0];
            var lineDiv = lineBorder.querySelectorAll('.lineDiv')[0];

            var tar = 0;
            var endX = 0;
            var dist = 0;

            tabBox.style.overflow='hidden';
            tabBox.style.position='relative';
            tabBox.style.width=800*tabList.length+"px";

            for(var i = 0 ;i<tabLi.length; i++ ){
                tabList[i].style.width=800+"px";
                tabList[i].style.float='left';
                tabList[i].style.float='left';
                tabList[i].style.padding='0';
                tabList[i].style.margin='0';
                tabList[i].style.verticalAlign='top';
                tabList[i].style.display='table-cell';
            }

            for(var i = 0 ;i<tabLi.length; i++ ){
                tabLi[i].start = i;
                tabLi[i].onclick = function(){
                    var star = this.start;
                    for(var i = 0 ;i<tabLi.length; i++ ){
                        tabLi[i].className='';
                    };
                    tabLi[star].className='active';
                    init.lineAnme(lineDiv,800/tabLi.length*star)
                    init.translate(tabBox,800,star);
                    endX= -star*800;
                }
            }

            function OnTab(star){
                if(star<0){
                    star=0;
                }else if(star>=tabLi.length){
                    star=tabLi.length-1
                }
                for(var i = 0 ;i<tabLi.length; i++ ){
                    tabLi[i].className='';
                };

                tabLi[star].className='active';
                init.translate(tabBox,800,star);
                endX= -star*800;
            };

            tabBox.addEventListener('touchstart',chstart,false);
            tabBox.addEventListener('touchmove',chmove,false);
            tabBox.addEventListener('touchend',chend,false);
            //按下
            function chstart(ev){
                ev.preventDefault;
                var touch = ev.touches[0];
                tar=touch.pageX;
                tabBox.style.webkitTransition='all 0s ease-in-out';
                tabBox.style.transition='all 0s ease-in-out';
            };
            //滑动
            function chmove(ev){
                var stars = wrap.querySelector('.active').start;
                ev.preventDefault;
                var touch = ev.touches[0];
                var distance = touch.pageX-tar;
                dist = distance;
                init.touchs(tabBox,800,tar,distance,endX);
                init.lineAnme(lineDiv,-dist/tabLi.length-endX/4);
            };
            //离开
            function chend(ev){
                var str= tabBox.style.transform;
                var strs = JSON.stringify(str.split(",",1));
                endX = Number(strs.substr(14,strs.length-18));

                if(endX>0){
                    init.back(tabBox,800,tar,0,0,0.3);
                    endX=0
                }else if(endX<-800*tabList.length+800){
                    endX=-800*tabList.length+800
                    init.back(tabBox,800,tar,0,endX,0.3);
                }else if(dist<-800/3){
                    OnTab(tabClick.querySelector('.active').start+1);
                    init.back(tabBox,800,tar,0,endX,0.3);
                }else if(dist>800/3){
                    OnTab(tabClick.querySelector('.active').start-1);
                }else{
                    OnTab(tabClick.querySelector('.active').start);
                }
                var stars = wrap.querySelector('.active').start;
                init.lineAnme(lineDiv,stars*800/4);

            };
        };

        var init={
            translate:function(obj,windowWidth,star){
                obj.style.webkitTransform='translate3d('+-star*800+'px,0,0)';
                obj.style.transform='translate3d('+-star*800+',0,0)px';
                obj.style.webkitTransition='all 0.3s ease-in-out';
                obj.style.transition='all 0.3s ease-in-out';
            },
            touchs:function(obj,windowWidth,tar,distance,endX){
                obj.style.webkitTransform='translate3d('+(distance+endX)+'px,0,0)';
                obj.style.transform='translate3d('+(distance+endX)+',0,0)px';
            },
            lineAnme:function(obj,stance){
                obj.style.webkitTransform='translate3d('+stance+'px,0,0)';
                obj.style.transform='translate3d('+stance+'px,0,0)';
                obj.style.webkitTransition='all 0.1s ease-in-out';
                obj.style.transition='all 0.1s ease-in-out';
            },
            back:function(obj,windowWidth,tar,distance,endX,time){
                obj.style.webkitTransform='translate3d('+(distance+endX)+'px,0,0)';
                obj.style.transform='translate3d('+(distance+endX)+',0,0)px';
                obj.style.webkitTransition='all '+time+'s ease-in-out';
                obj.style.transition='all '+time+'s ease-in-out';
            },
        }


    </script>

@endsection

