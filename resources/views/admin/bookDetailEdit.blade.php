@extends('layouts.master')
@section('content')
    <div class="container">
        <!--面包屑导航 开始-->
        <div class="crumb_warp">
            <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
            <i class="fa fa-home"></i> <a href="{{asset('admin/index')}}">首页</a> &raquo; <a href="{{asset('admin/book/detail/'.$b_id)}}">书籍章节管理</a> &raquo; 编辑书籍章节

        </div>
        <!--面包屑导航 结束-->
        <hr>
        <div class="row">
            <div class="col-md-6">
                <form action="{{url('admin/book/detailedit/'.$book->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <table class="add_tab">
                        <tbody>
                        <tr>
                            <th>章节名称：</th>
                            <td>
                                <input type="text" name="title" value="{{$book->title}}" style="width: 300px;height: 30px;">
                                @if($errors->first('title'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {{$errors->first('title')}}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>章节内容：</th>
                            <td>
                                <textarea name="url" id="" cols="30" rows="10" style="width: 600px;height: 230px;">{{$url}}</textarea>
                                @if($errors->first('url'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {{$errors->first('url')}}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input type="submit" value="提交">
                                <input type="button" class="back" onclick="history.go(-1)" value="返回">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

@endsection