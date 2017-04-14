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
                        <a href="{{url('admin/register')}}" class="">
                            注册
                        </a>

                    </li>

                </ul>

            </div>

        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->



<div class="account-container">

    <div class="content clearfix">

        <form action="{{url('admin/doLogin')}}" method="post">

            <h1>欢迎登陆</h1>

            <div class="login-fields">

                <p>请提供您的详细信息</p>
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
                @if (session('mess'))
                    <div class="alert alert-danger">
                        {{ session('mess') }}
                    </div>
                @endif
                {{csrf_field()}}
                <div class="field">
                    <label for="username">Username</label>
                    <input type="text" name="name"  placeholder="Username" class="login username-field" />
                </div> <!-- /field -->

                <div class="field">
                    <label for="password">Password:</label>
                    <input type="password"  name="password" placeholder="Password" class="login password-field"/>
                </div> <!-- /password -->

            </div> <!-- /login-fields -->

            <div class="login-actions">
                <button class="button btn btn-success btn-large">登　陆</button>
            </div> <!-- .actions -->



        </form>

    </div> <!-- /content -->

</div> <!-- /account-container -->



<div class="login-extra">
    <a href="#">忘记密码？</a>
</div> <!-- /login-extra -->


<script src="/admin/js/jquery-1.7.2.min.js"></script>
<script src="/admin/js/bootstrap.js"></script>

<script src="/admin/js/signin.js"></script>

</body>

</html>
