@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a  href="" onclick="history.go(-1)" >返回上一级</a>
                <div style="height:30px"></div>
                <form action="" method="post" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">分类名</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$category->name}}">
                        @if($errors->first('name'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('name')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">pid</label>
                        <input type="text"  name="pid" value="{{$category->pid}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">path</label>
                        <input type="text"  name="path" value="{{$category->path}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">状态</label>
                        <input type="radio"  name="display" value="1"  @if($category->display == 1) checked @endif>显示
                        <input type="radio"  name="display" value="2" @if($category->display == 2) checked @endif>隐藏
                    </div>
                    <button type="submit" class="btn btn-default">确认添加</button>
                </form>
            </div>
        </div>
    </div>

@endsection