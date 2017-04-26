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
            text-align:left;
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
            /*取消收藏*/
            $('.collect').click(function(){
                var $_this = $(this);
                var $books_id = $_this.parents().parents().children().first().children().first().val();
//                alert($editId);
                var txt=  "确定要取消收藏吗？";
                var option = {
                    title: "收藏",
                    btn: parseInt("0011",2),
                    onOk: function(){
                        location.href="/home/space/book/no_collect/"+$books_id;
                    }
                }
                window.wxc.xcConfirm(txt, "custom", option);
            })

        })


        /*更换头像*/
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
            <li class="active">购买书籍</li>
            <li>收藏书籍</li>
            <li></li>
            <li></li>
        </ul>
        <div class="lineBorder">
            <div class="lineDiv"><!--移动的div--></div>
        </div>
        <div class="tabCon">
            <div class="tabBox">
                <div class="tabList">
                      <table class="table">
                          <tbody>
                          @if(!empty($order[0]))
                          <tr>
                              <th>书名</th>
                              <th>图片</th>
                              <th>操作</th>
                          </tr>

                          @foreach($order as $k=>$v)
                              <tr>
                                   <td>{{$v->title}}</td>
                                   <td><img src="/{{$v->icon}}" alt="" width="60px" height="80px" style="margin-top:0;"></td>
                                          <td><a href="{{url('/home/space/book/read_record/'.$v->id)}}" class="btn btn-info">开始阅读</a></td>
                              </tr>
                              @endforeach
                          @else
                              <tr>
                                  <td colspan="3"><a href="{{url('home/index')}}"><img src="/home/img/read.jpg" alt="" width="800px" height="500px"></a></td>
                              </tr>
                          @endif
                          </tbody>
                      </table>
                    {{$order->links('admin/page')}}
                </div>
                <div class="tabList">
                    @if(!empty($book))
                        @foreach($book as $k => $v)
                        <div style="float: left;margin-left:30px;">
                            <div><input type="hidden" value="{{$v->id}}" name="books_id"></div>
                            <div style="width: 100px;height: 140px;"><a href="{{url('/home/detail/'.$v->id)}}"><img src="/{{$v->icon}}" alt="" width="80px" height="100px" style="margin-left:24px;"></a></div>
                            <div style="height: 30px;"><span style="text-align: center">{{$v->title}}</span></div>
                            <div><button class="btn btn-warning collect" style="margin-left: 23px;">取消收藏</button></div>
                        </div>
                        @endforeach
                    @else
                        <span style="font-size: 30px;margin-left: 300px;">还没有任何收藏哦~~</span>
                    @endif
                </div>
                <div class="tabList">

                </div>
                <div class="tabList">

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