<?php

include './function.php';
$url = "http://web.juhe.cn:8080/constellation/getAll?consName={$xz}&type=today&key=f59d3f4b6ecd9d9f983ef6b7b747eb2b";
$res = https_request($url);
$res = json_decode($res);


?>

@extends('layouts/hmaster')
@section('hcss')
    <title>Bootstrap多彩渐变进度条特效 - 站长素材</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
        .demo{
            margin-bottom: 100px;
        }
        .progress{
            background: #262626;
            border-radius: 20px;
            height: 20px;

            box-shadow: 0 5px 4px -6px #aaa;
            margin-top: 50px;
            overflow: visible;
        }
        .progress .progress-bar{
            border-radius: 20px;
            position: relative;
            animation: animate-positive 2s;
        }
        .progress .progress-bar:after{
            content: "\f111";
            font-family: fontawesome;
            font-size: 10px;
            color: rgba(0,0,0,0.4);
            position: absolute;
            top: -1px;
            right: 10px;
        }
        .progress .progress-value{
            display: block;
            font-size: 13px;
            color: #fff;
            border-radius: 4px;
            padding: 3px 8px;
            position: absolute;
            top: -40px;
            right: -27px;
        }
        .progress .progress-value:after{
            content: "";

            border-bottom: 5px solid transparent ;
            border-right: 5px solid transparent;
            position: absolute;
            bottom: -6px;
            left: 0;
        }
        @-webkit-keyframes animate-positive{
            0% { width: 0%; }
        }
        @keyframes animate-positive{
            0% { width: 0%; }
        }
        
        .bank{width: 100%;  height: 500px; background-image: url("/home/image/xzjk.jpg");background-size:100%; }
        .la input{width: 300px;}
    </style>
        @endsection

@section('content')
    <div class="bank"></div>
        <h2 style="margin:0 auto; text-align: center; margin-top:100px;">{{$res->name}}今日运势</h2>

    <div class="demo">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="progress">
                        <div class="progress-bar" style="width: {{$res->health}}; background: linear-gradient(to right, #F8E78B 35%,#6CC135 68%);">
                            <span style="font-weight: bold;">健康</span>
                            <div class="progress-value">20%</div>
                        </div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar" style="width: {{$res->work}}; background: linear-gradient(to right, #D6B8AA 35%,#B93331 68%);">
                            <span style="font-weight: bold;">工作</span>
                            <div class="progress-value">75%</div>
                        </div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar" style="width: {{$res->money}}; background: linear-gradient(to right, #C4EDE9 35%,#0158AD 68%);">
                            <span style="font-weight: bold;">金钱</span>
                            <div class="progress-value">90%</div>
                        </div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar" style="width: {{$res->love}}; background: linear-gradient(to right, #FECAB2 35%, #FE4162 68%);">
                            <span style=" font-weight: bold;">爱情</span>
                            <div class="progress-value">60%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('j-s')
    <script>


        $(document).ready(function(){
            $('#xz').change(function(){
                var $xz = $(this).children('option:selected').val();
                alert($xz);
            })

        })
    </script>
    @endsection
