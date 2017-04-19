<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登陆</title>
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/login.css')}}">
    <style>
        .wrapper{height:673px;margin-top:-340px; }
        .pos{margin-top:30px;}
    </style>
</head>
<body>
<div class="htmleaf-container">
    <div class="wrapper">
        <div class="container">
            <div class="pos">
                <h1>登陆</h1>
                <br>
                <p><a href="{{url('home/reg')}}" style="color:#fff; text-decoration: none; cursor: pointer">点此注册</a></p>
                <br>
                @if (session('mess'))
                    <div class="alert alert-success">
                        {{ session('mess') }}
                    </div>
                @endif
                <form class="form" action="{{url('home/doLogin')}}" method="post">
                    {{csrf_field()}}
                    <p><input type="email" name="email" placeholder="邮箱">
                        @if(count($errors)>0)
                            {{$errors->first('email')}}
                        @endif
                    </p>
                    <br>
                    <p><input type="password" name="password" placeholder="密码">
                        @if(count($errors)>0)
                            {{$errors->first('password')}}
                        @endif
                    </p>
                    <br>
                    <div style="width:250px;height:20px;margin-left:175px;">
                        <div style="float:left">
                            <p><input type="text" name="code" placeholder="验证码" style="width: 120px">

                            </p>
                        </div>
                        <div style="float:right">
                            {!! captcha_img() !!}
                        </div>
                        @if(count($errors)>0)
                            {{$errors->first('code')}}
                        @endif
                    </div>

                    <br>
                    <br>
                    <input type="submit"   value="登陆">
                </form>
            </div>
        </div>


        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div>

<script src="{{url('home/js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
<script>
    $('#login-button').click(function (event) {
        event.preventDefault();
        $('form').fadeOut(500);
        $('.wrapper').addClass('form-success');
    });
    $('#login-button').click(function(){
        $('.pos p').css('display','none')
        $('.wrapper').css('height','675')
    });
</script>

</body>
</html>