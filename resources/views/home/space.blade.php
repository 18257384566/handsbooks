@extends('layouts/spaceMaster')
@section('hcss')
    <meta name="description" content="3 styles with inline editable feature" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="{{url('/home/css/spaceMaster.css')}}">
    <link rel="stylesheet" href="{{url('/home/css/spaceUser.css')}}">
    <link href="{{url('/home/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/home/tk/css/xcConfirm.css')}}">
    <style>
        .books_rec{margin-top: -242px;}
        .xcConfirm .popBox{
            width: 500px;
            height: 300px;
        }
        .tabList{
            text-align:center;
        }
    </style>
    @endsection
@section('js')
    {{--<script type="text/javascript" src="/home/js/jquery.js"></script>--}}
    <script src="{{url('home/js/jquery.min.js')}}"></script>
    <script src="{{url('home/tk/js/xcConfirm.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{url('home/tk/js/jquery-1.9.1.js')}}" type="text/javascript" charset="utf-8"></script>
    <script>
        $(function() {
            $('#editBtn').click(function () {
                $.ajax({
                    url: '/home/space/doEdit',
                    type: 'post',
                    data:{
                        'name':$("input[name='name']").val(),
                        '_token':$("input[name='_token']").val(),
                        'sex':$("input[name='sex']").val(),
                    },
                    success: function (data) {
                        if(data == 1){
                            var txt=  "用户名不能为空";
                            window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.error);
                        }else{
                            var txt=  "修改成功";
                            window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.success);
                        }
//                        alert(data);
                    },
                    error: function () {
                        alert('失败');
                    }
                })
            })

            $('#editPass').click(function(){
                $.ajax({
                    url:'/home/space/editPass',
                    type:'post',
                    cache: false,
                    data:{
                        '_token':$("input[name='_token']").val(),
                        'email':$("input[name='email']").val(),
                        'password':$("input[name='password']").val(),
                        'newpassword':$("input[name='newpassword']").val(),
                        'newpassword_confirmation':$("input[name='newpassword_confirmation']").val()
                    },
                    success:function(data){
//                        alert(data);
                       if(data == 1){
                           var txt=  "密码不能为空";
                           window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.error);
                       }else if(data == 2){
                           var txt=  "新密码不能为空";
                           window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.error);
                       }else if(data == 3){
                           var txt=  "确认密码不能为空";
                           window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.error);
                       }else if(data == 4){
                           var txt=  "修改密码成功";
                           window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.success);
                       }else if(data == 5){
                           var txt=  "修改密码失败";
                           window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.error);
                       }else if(data == 6){
                           var txt=  "密码输入错误";
                           window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.error);
                       }else{
                           var txt=  "两次密码不一致";
                           window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.error);
                       }
                    },
                    error:function(){
                        alert('失败');
                    }
                })
            })

            $('#changeEmail').click(function() {
                var txt=  "确定要解除绑定吗？！";
                var option = {
                    title: "",
                    btn: parseInt("0011",2),
                    onOk: function(){
                        $("#changeEmail").hide();
                        $("#box").append("<div class='rows'> <div class='col-md-4 col-md-offset-4'><p><input class='form-control'  type='email' name='email' id='email' placeholder='请输入邮箱'></p><p><button id='emailEdit' class='btn btn-warning'>确认修改</button></p></div></div>");
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
                                        var txt=  "修改成功,请激活邮箱在登陆";
                                        window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.success);
//                            alert('修改成功,请激活邮箱在登陆');
//                            location.href='/home/index';
                                    }else if(data == 2){
                                        var txt=  "邮箱已绑定！";
                                        window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.error);
//                            alert('邮箱已绑定！');
                                    }else{
                                        var txt=  "邮箱不能为空！";
                                        window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.error);
//                            alert('邮箱不能为空');
                                    }
                                },
                                error:function(){
                                    alert('修改失败');
                                },
//                    dataType:'json',

                            })
                        })
                    }
                }

                window.wxc.xcConfirm(txt, "custom", option);

            })

        })

        function changeImg(element)
        {
            var oldsrc = element.src;
//            alert(oldsrc);
            var newobj = document.createElement('input');
            var newbtn = document.createElement('input');
            newobj.type = 'file';
            newobj.name = 'icon';
            newbtn.type = 'submit';
//            newbtn.class = 'btn btn-info';
            newbtn.id = 'lala';
            newbtn.onclick = function(){
                element.src = this.src ? this.src : oldsrc;
            }
            element.src = '';
            element.appendChild(newobj);
            element.appendChild(newbtn);

            newobj.focus();
        }
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
                    <p><img src="/{{$user->icon}}" alt="" width="128" height="128" /></p>
                    <p>用户名：{{$user->name}}</p>
                    <p>邮箱：{{$user->email}}</p>
                    <p>性别：@if($user->sex == 0) 男 @else 女 @endif</p>
                    </div>
                <div class="tabList">
                    <div class="rows">
                        <div class="col-md-4 col-md-offset-4">
                    <h3 style="margin-bottom:30px;">修改基本信息</h3>
                    {{--<form action="{{url('home/space/doEdit')}}" method="post" enctype="multipart/form-data">--}}
                            <form id="aaa">
                        {{csrf_field()}}
                        <p>用户名：<input class="form-control" id="exampleInputEmail1" type="text" name="name" value="{{$user->name}}"></p>
                            <p>　性别：<input type="radio" name="sex" value="0" @if($user->sex == 0) checked @endif>男
                                <input type="radio" name="sex" value="1" @if($user->sex == 1) checked @endif>女</p>
                            <p><input type="button" value="确认修改" id="editBtn"></p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tabList">
                    <div class="rows">
                        <div class="col-md-4 col-md-offset-4">
                    <h3 style="margin-bottom:30px;">修改密码</h3>
                        {{csrf_field()}}
                           <input type="hidden" name="email" value="{{$user->email}}">
                        <p>　请输入密码：<input class="form-control" id="exampleInputEmail1" type="password" name="password"></p>
                        <p>请输入新密码：<input class="form-control" id="exampleInputEmail1" type="password" name="newpassword"></p>
                        <p>　请确认密码：<input class="form-control" id="exampleInputEmail1" type="password" name="newpassword_confirmation"></p>
                        <p><input class="btn " type="submit" value="确认修改" id="editPass"></p>
                    </div>
                    </div></div>
                <div class="tabList">
                    <h3 style="margin-bottom:30px;">邮箱重新绑定</h3>
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
                    }
                    tabLi[star].className='active';
                    init.lineAnme(lineDiv,900/tabLi.length*star);
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
                }

                tabLi[star].className='active';
                init.translate(tabBox,900,star);
                endX= -star*900;
            }

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
            }
            //滑动
            function chmove(ev){
                var stars = wrap.querySelector('.active').start;
                ev.preventDefault;
                var touch = ev.touches[0];
                var distance = touch.pageX-tar;
                dist = distance;
                init.touchs(tabBox,900,tar,distance,endX);
                init.lineAnme(lineDiv,-dist/tabLi.length-endX/4);
            }
            //离开
            function chend(ev){
                var str= tabBox.style.transform;
                var strs = JSON.stringify(str.split(",",1));
                endX = Number(strs.substr(14,strs.length-18));

                if(endX>0){
                    init.back(tabBox,900,tar,0,0,0.3);
                    endX=0
                }else if(endX<-900*tabList.length+900){
                    endX=-900*tabList.length+900;
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

            }
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
            }
        }


    </script>
    @endsection