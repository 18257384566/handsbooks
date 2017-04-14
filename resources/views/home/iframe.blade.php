
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>无标题文档</title>
    <link rel="stylesheet" href="/home/css/iframe.css">

    <script type="text/javascript" src="home/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/modernizr-custom-v2.7.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var $huantu=$('.Xcontent06>img');
            var $miaobian1=$('.Xcontent26>div');
            $miaobian1.click(function(){miaobian1(this);});

            function miaobian1(thisMb1){
                for(var i=0; i<$miaobian1.length; i++){
                    $miaobian1[i].style.borderColor = '#dedede';
                }
//		thisMb.style.borderColor = '#cd2426';
                thisMb1.style.borderColor = '#cd2426';
                $huantu[0].src = thisMb1.children[0].src;
            }
            $(".Xcontent33").click(function(){
                var value=parseInt($('.input').val())+1;
                $('.input').val(value);
            })

            $(".Xcontent32").click(function(){
                var num = $(".input").val()
                if(num>0){
                    $(".input").val(num-1);
                }

            })

        })
    </script>


</head>

<body>
<div class="Xcontent">
    <ul class="Xcontent01">

        <div class="Xcontent06"><img src="/home/img/X1.png"></div>
        <ol class="Xcontent13">
            <div class="Xcontent14"><a href="#"><p>新物品</p></a></div>
            <div class="Xcontent15"><img src="/home/img/X11.png"></div>
            <div class="Xcontent16"><p>充电5分钟，温暖2小时</p></div>
            <div class="Xcontent17">
                <p class="Xcontent18">售价</p>
                <p class="Xcontent19">￥<span>69.00</span></p>
                <div class="Xcontent20">
                    <p class="Xcontent21">促销</p>
                    <p class="Xcontent22">领610元新年礼券，满再赠好礼</p>
                </div>
            </div>
            <div class="Xcontent34"><a href="#"><img src="images/shangpinxiangqing/X17.png"></a></div>
            <div class="Xcontent35"><a href="#"><img src="images/shangpinxiangqing/X18.png"></a></div>
        </ol>
    </ul>

</div>
</body>
</html>
