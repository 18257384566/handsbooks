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
        /*.xcConfirm .popBox{*/
            /*width: 500px;*/
            /*height: 300px;*/
        /*}*/
        .tabClick a:hover{
            text-decoration: none;
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
            /*付款*/
            $('.isPay').click(function(){
                var $_this = $(this);
//               var $status = $_this.html();
//               alert($_this.html());
                var $editId = $_this.parents().parents().children().first().html();
//               alert($editId);
                if($_this.html() == '已取消'){
                    var txt=  "订单已经取消了！！";
                    window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.error);
                }else{
                    var txt=  "确定要确认支付吗？";
                    var option = {
                        title: "订单",
                        btn: parseInt("0011",2),
                        onOk: function(){
                            location.href="/home/space/order/toPay/"+$editId;
                        }
                    }
                    window.wxc.xcConfirm(txt, "custom", option);
//               alert($editId);
                }

            })
            /*取消*/
            $('.isCancel').click(function(){
                var $_this = $(this);
//               var $status = $_this.html();
//               alert($_this.html());
                var $editId = $_this.parents().parents().children().first().html();
//               alert($editId);
                if($_this.html() == '已取消'){
                    var txt=  "订单已经取消了！！";
                    window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.error);
                }else{
                    var txt=  "确定要取消订单吗？";
                    var option = {
                        title: "订单",
                        btn: parseInt("0011",2),
                        onOk: function(){
                            location.href="/home/space/order/isCancel/"+$editId;
                        }
                    }
                    window.wxc.xcConfirm(txt, "custom", option);
//               alert($editId);
                }

            })
            /*评论*/
            $('.comment').click(function(){
                var $_this = $(this);
//               var $status = $_this.html();
//               alert($_this.html());
                var $editId = $_this.parents().parents().children().first().next().html();
//               alert($editId);
               if($_this.html() == '未评论'){
                   var txt=  "请输入";
                   window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.input,{
                       onOk:function(v){
                           var $comment = v;
                           $.ajax({
                               url:'/home/space/order/comment',
                               type:'post',
                               data:{
                                   '_token':'{{csrf_token()}}',
                                   'orders_id':$editId,
                                   'comment':$comment
                               },
                               success:function(data){
                                   if(data){
                                       var txt=  "评论成功！";
                                       window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.success);
                                       $('.comment').hide();
                                   }else{
                                       var txt=  "评论失败！";
                                       window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.error);
                                   }
                               },
                               error:function(){
                                   var txt=  "系统错误，请联系管理员！";
                                   window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.error);
                               }
                           })
                       }
                   });
               }else{
                   var txt=  "已经评论过了哦~~~";
                   window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.info);
               }


            })
            /*已经评论*/
            $('.comment_ok').click(function(){
                var txt=  "亲，您已经评论过了哦~~";
                window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.info);
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

        $('.tabClick li').click(function(){
           alert($(this).html());
        })
    </script>
@endsection
@section('main')
    <div class="wrap" id="wrap">
        @if($num == 1)
        <ul class="tabClick">
            <li class="active"><a href="{{url('home/space/order/1')}}">订单列表</a></li>
            <li><a href="{{url('home/space/order/2')}}">未支付</a></li>
            <li><a href="{{url('home/space/order/3')}}">已取消</a></li>
            <li><a href="{{url('home/space/order/4')}}">完成订单</a></li>
        </ul>
        <div class="lineBorder">
            <div class="lineDiv"><!--移动的div--></div>
        </div>
        <div class="tabCon">
            <div class="tabBox">
                {{--全部订单--}}

                <div class="tabList">
                  <table class="table">
                      <tbody>
                      <tr>
                          <th>ID</th>
                          <th>订单号</th>
                          <th>图片</th>
                          <th>书名</th>
                          <th>价格</th>
                          <th>下单时间</th>
                          <th>支付</th>
                          <th>取消</th>
                      </tr>
                      @foreach($order as $k => $v)
                          <tr>
                              @foreach($time as $key => $value)
                                  @if($k == $key)
                                      <td>{{$value->id}}</td>
                                  @endif
                              @endforeach
                              <td>{{$v->ord_num}}</td>
                              <td><img src="/{{$v->icon}}" alt="" width="50" height="70" style="margin-top:0px"></td>
                              <td>{{$v->title}}</td>
                              <td>{{$v->price}}</td>
                              @foreach($time as $key => $value)
                                @if($k == $key)
                              <td>{{$value->created_at}}</td>
                                  @endif
                              @endforeach
                              <td>@if($v->isPay == 0) 未支付 @else 已支付 @endif</td>
                              <td>@if($v->cancel == 0) 未取消 @else 已取消 @endif</td>
                          </tr>

                          @endforeach
                      </tbody>
                  </table>
                    {{$order->links('admin/page')}}
                </div>
                @elseif($num == 2)
                    <ul class="tabClick">
                        <li><a href="{{url('home/space/order/1')}}">订单列表</a></li>
                        <li class="active"><a href="{{url('home/space/order/2')}}">未支付</a></li>
                        <li><a href="{{url('home/space/order/3')}}">已取消</a></li>
                        <li><a href="{{url('home/space/order/4')}}">完成订单</a></li>
                    </ul>
                    <div class="lineBorder">
                        <div class="lineDiv" style="margin-left: 230px;"><!--移动的div--></div>
                    </div>
                    <div class="tabCon">
                        <div class="tabBox">
                            {{--全部订单--}}
                <div class="tabList">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>订单号</th>
                            <th>图片</th>
                            <th>书名</th>
                            <th>价格</th>
                            <th>下单时间</th>
                            <th>支付</th>
                            <th>取消</th>
                        </tr>
                        @foreach($order as $k => $v)
                            <tr>
                                @foreach($time as $key => $value)
                                    @if($k == $key)
                                        <td>{{$value->id}}</td>
                                    @endif
                                @endforeach
                                <td>{{$v->ord_num}}</td>
                                <td><img src="/{{$v->icon}}" alt="" width="50" height="70" style="margin-top:0px"></td>
                                <td>{{$v->title}}</td>
                                <td>{{$v->price}}</td>
                                @foreach($time as $key => $value)
                                    @if($k == $key)
                                        <td>{{$value->created_at}}</td>
                                    @endif
                                @endforeach
                                <td><button class="btn btn-warning isPay">@if($v->isPay == 0) 未支付 @else 已支付 @endif</button></td>
                                <td><button class="btn btn-info isCancel">@if($v->cancel == 0) 未取消 @else 已取消 @endif</button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$order->links('admin/page')}}
                </div>
                @elseif($num == 3)
                <ul class="tabClick">
                    <li><a href="{{url('home/space/order/1')}}">订单列表</a></li>
                    <li><a href="{{url('home/space/order/2')}}">未支付</a></li>
                    <li class="active"><a href="{{url('home/space/order/3')}}">已取消</a></li>
                    <li><a href="{{url('home/space/order/4')}}">完成订单</a></li>
                </ul>
                <div class="lineBorder">
                    <div class="lineDiv" style="margin-left: 450px;"><!--移动的div--></div>
                </div>
                <div class="tabCon">
                    <div class="tabBox">
                        {{--全部订单--}}
                <div class="tabList">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>订单号</th>
                            <th>图片</th>
                            <th>书名</th>
                            <th>价格</th>
                            <th>下单时间</th>
                        </tr>
                        @foreach($order as $k => $v)
                            <tr>
                                @foreach($time as $key => $value)
                                    @if($k == $key)
                                        <td>{{$value->id}}</td>
                                    @endif
                                @endforeach
                                <td>{{$v->ord_num}}</td>
                                <td><img src="/{{$v->icon}}" alt="" width="50" height="70" style="margin-top:0px"></td>
                                <td>{{$v->title}}</td>
                                <td>{{$v->price}}</td>
                                @foreach($time as $key => $value)
                                    @if($k == $key)
                                        <td>{{$value->created_at}}</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$order->links('admin/page')}}
                </div>
                @elseif($num == 4)
                <ul class="tabClick">
                    <li><a href="{{url('home/space/order/1')}}">订单列表</a></li>
                    <li><a href="{{url('home/space/order/2')}}">未支付</a></li>
                    <li><a href="{{url('home/space/order/3')}}">已取消</a></li>
                    <li class="active"><a href="{{url('home/space/order/4')}}">完成订单</a></li>
                </ul>
                <div class="lineBorder">
                    <div class="lineDiv" style="margin-left: 690px;"><!--移动的div--></div>
                </div>
                <div class="tabCon">
                    <div class="tabBox">
                        {{--全部订单--}}
                <div class="tabList">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>订单号</th>
                            <th>图片</th>
                            <th>书名</th>
                            <th>价格</th>
                            <th>下单时间</th>
                            <th>评论</th>
                        </tr>
                        @foreach($order as $k => $v)
                                <tr>
                                    @foreach($time as $key => $value)
                                        @if($k == $key)
                                            <td>{{$value->id}}</td>
                                        @endif
                                    @endforeach
                                    <td>{{$v->ord_num}}</td>
                                    <td><img src="/{{$v->icon}}" alt="" width="50" height="70" style="margin-top:0px"></td>
                                    <td>{{$v->title}}</td>
                                    <td>{{$v->price}}</td>
                                    @foreach($time as $key => $value)
                                        @if($k == $key)
                                            <td>{{$value->created_at}}</td>
                                        @endif
                                    @endforeach
                                     <td><button class="btn btn-success comment">@if($v->is_comment == 0)未评论@else已评论@endif</button></td>

                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$order->links('admin/page')}}
                </div>
                    @endif
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