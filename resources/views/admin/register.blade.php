<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login - Bootstrap Admin Template</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

    <link href="/admin/css/font-awesome.css" rel="stylesheet">

    <link href="/admin/css/style.css" rel="stylesheet" type="text/css">
    <link href="/admin/css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>

<div class="navbar navbar-fixed-top">

    <div class="navbar-inner">

        <div class="container">

            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="">
                网站名字
            </a>

            <div class="nav-collapse">
                <ul class="nav pull-right">

                    <li class="">
                        <a href="{{url('admin/login')}}" class="">
                            登陆
                        </a>

                    </li>

                </ul>

            </div>

        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->



<div class="account-container register">

    <div class="content clearfix">

        <form action="doRegister"  method="post">
            {{csrf_field()}}
            <h1>免费注册账号</h1>

            <div class="login-fields">

                <p>创建您的免费账户:</p>
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                                @endforeach
                            </ul>
                    </div>
                @endif
                <div class="field">
                    <label for="firstname">Name:</label>
                    <input type="text"  name="name"  placeholder="请输入用户名" class="login" />
                </div> <!-- /field -->

                <div class="field">
                    <label for="password">Password:</label>
                    <input type="password"  name="password"  placeholder="请输入密码" class="login"/>
                </div> <!-- /field -->

                <div class="field">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password"  name="password_confirmation"  placeholder="请确认密码" class="login"/>
                </div> <!-- /field -->

            </div> <!-- /login-fields -->

            <div class="login-actions">

                <button class="button btn btn-primary btn-large">注册</button>

            </div> <!-- .actions -->

        </form>

    </div> <!-- /content -->

</div> <!-- /account-container -->



<div class="login-extra">
    <a href="#">已经有账号?　请点击登陆</a>
</div> <!-- /login-extra -->


<script src="/admin/js/jquery-1.7.2.min.js"></script>
<script src="/admin/js/bootstrap.js"></script>

<script src="/admin/js/signin.js"></script>

</body>

</html>
