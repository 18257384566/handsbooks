@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">姓名</label>
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
                        <input type="text" class="form-control" id="exampleInputPassword1" name="age" value="{{$user->age}}">
                        @if($errors->first('sex'))
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{$errors->first('sex')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">头像</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="grade" value="{{$user->grade}}">
                        @if($errors->first('grade'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('grade')}}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default">确认修改</button>
                </form>
            </div>
        </div>
    </div>

    @endsection