@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">用户名</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$user->name}}">
                        @if($errors->first('name'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('name')}}
                            </div>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">性别</label>
                        <input type="radio" name="sex" value="0" @if($user->sex == 0) checked @endif>男
                        <input type="radio" name="sex" value="1" @if($user->sex == 1) checked @endif>女
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">作者</label>
                        <input type="radio" name="is_author" value="0" @if($user->is_author == 0) checked @endif>否
                        <input type="radio" name="is_author" value="1" @if($user->is_author == 1) checked @endif>是
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">头像</label>
                        <input type="file" name="icon" value="{{$user->icon}}">
                    </div>
                    <input type="submit" class="btn btn-default" value="确认修改"></input>
                </form>
            </div>
        </div>
    </div>

    @endsection