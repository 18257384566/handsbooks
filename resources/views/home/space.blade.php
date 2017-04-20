@extends('layouts/spaceMaster')
@section('hcss')
    <link rel="stylesheet" href="{{url('home/css/spaceMaster.css')}}">
    <link rel="stylesheet" href="/home/css/spaceUser.css">
    @endsection
@section('js')
    {{--<script type="text/javascript" src="/home/js/jquery.js"></script>--}}
    <script src="{{url('home/js/jquery.min.js')}}"></script>
    <script>
        $(function(){
//            $("#changeEmail").popover();
//            alert($("input[name='_token']").val());
            $('#changeEmail').click(function() {
                $("#changeEmail").hide();
                $("#box").append("<p><input type='email' name='email' id='email' placeholder='请输入邮箱'></p><p><button id='emailEdit'>确认修改</button></p>");
                $('#emailEdit').click(function(){
                 var $email = $('#email').val();
//                 alert($email);
                $.ajax({
                    url:'/home/space/editEmail',
                    type:'post',
                    data:{
                        'email':$email,
                        '_token':$("input[name='_token']").val(),
                    },
                    success:function(data){
                        if(data == 1){
                            alert('修改成功,请激活邮箱在登陆');
                            location.href='/home/index';
                        }else if(data == 2){
                            alert('邮箱已绑定！');
                        }else{
                            alert('邮箱不能为空');
                        }
                    },
                    error:function(){
                        alert('修改失败');
                    },
//                    dataType:'json',

                })
                })
            })

        })
    </script>
    @endsection
@section('main')

    <div class="wrap" id="wrap">
        <ul class="tabClick">
            <li class="active">信息列表</li>
            <li>修改信息</li>
            <li>修改密码</li>
            <li>重绑邮箱</li>
        </ul>
        <div class="lineBorder">
            <div class="lineDiv"><!--移动的div--></div>
        </div>
        <div class="tabCon">
            <div class="tabBox">
                <div class="tabList">
                    <img src="{{'/'.$user->icon}}" alt="" width="128" height="128" />
                    <p>用户名：{{$user->name}}</p>
                    <p>邮箱：{{$user->email}}</p>
                    <p>性别：@if($user->sex == 0) 男 @else 女 @endif</p>
                    </div>
                <div class="tabList">
                    <h3>修改基本信息</h3>
                    <form action="{{url('home/space/doEdit')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <p>用户名：<input type="text" name="name" value="{{$user->name}}">
                        @if($errors->first('name'))
                            <div class="alert alert-danger" style="width: 280px;">
                                {{$errors->first('name')}}
                            </div>
                            @endif
                            </p>
                            <p>　性别：<input type="radio" name="sex" value="0" @if($user->sex == 0) checked @endif>男
                                <input type="radio" name="sex" value="1" @if($user->sex == 1) checked @endif>女</p>
                            <p>　头像：<input type="file" name="icon"></p>
                            <p><input type="submit" value="确认修改"></p>
                    </form>

                    </div>
                <div class="tabList">
                    <h3>修改密码</h3>
                    <form action="{{url('home/space/editPass')}}" method="post">
                        {{csrf_field()}}
                        <p>　请输入密码：<input type="password" name="oldpwd">
                        @if (session('mess'))
                            <div class="alert alert-danger" style="width: 280px;">
                                {{ session('mess') }}
                            </div>
                            @endif
                            </p>
                            <p>请输入新密码：<input type="password" name="password">
                            @if($errors->first('password'))
                                <div class="alert alert-danger" style="width: 280px;">
                                    {{$errors->first('password')}}
                                </div>
                                @endif
                                </p>
                                <p>　请确认密码：<input type="password" name="password_confirmation">
                                @if($errors->first('password_confirmation'))
                                    <div class="alert alert-danger" style="width: 280px;">
                                        {{$errors->first('password_confirmation')}}
                                    </div>
                                    @endif
                                    </p>
                                    <p><input type="submit" value="确认修改"></p>
                    </form>
                    </div>
                <div class="tabList">
                    <h3>邮箱重新绑定</h3>
                    <p>绑定的邮箱：{{$user->email}} <button id="changeEmail" class="btn btn-success" >解除绑定</button></p>
                    <p>
                        <div id="box">
                        {{csrf_field()}}
                            {{--<form action="" method="get"  ></form>--}}
                        </div>
                    </p>

            </div>
        </div>
    </div>
    @endsection

@section('j-s')
    <script>


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
            tabBox.style.width=900*tabList.length+"px";

            for(var i = 0 ;i<tabLi.length; i++ ){
                tabList[i].style.width=900+"px";
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
                    init.lineAnme(lineDiv,900/tabLi.length*star)
                    init.translate(tabBox,900,star);
                    endX= -star*900;
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
                init.translate(tabBox,900,star);
                endX= -star*900;
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
                init.touchs(tabBox,900,tar,distance,endX);
                init.lineAnme(lineDiv,-dist/tabLi.length-endX/4);
            };
            //离开
            function chend(ev){
                var str= tabBox.style.transform;
                var strs = JSON.stringify(str.split(",",1));
                endX = Number(strs.substr(14,strs.length-18));

                if(endX>0){
                    init.back(tabBox,900,tar,0,0,0.3);
                    endX=0
                }else if(endX<-900*tabList.length+900){
                    endX=-900*tabList.length+900
                    init.back(tabBox,900,tar,0,endX,0.3);
                }else if(dist<-900/3){
                    OnTab(tabClick.querySelector('.active').start+1);
                    init.back(tabBox,900,tar,0,endX,0.3);
                }else if(dist>900/3){
                    OnTab(tabClick.querySelector('.active').start-1);
                }else{
                    OnTab(tabClick.querySelector('.active').start);
                }
                var stars = wrap.querySelector('.active').start;
                init.lineAnme(lineDiv,stars*900/4);

            };
        };

        var init={
            translate:function(obj,windowWidth,star){
                obj.style.webkitTransform='translate3d('+-star*900+'px,0,0)';
                obj.style.transform='translate3d('+-star*900+',0,0)px';
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