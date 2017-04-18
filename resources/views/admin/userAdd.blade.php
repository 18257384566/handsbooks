@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{url('home/doReg')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">用户名</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" >
                        @if($errors->first('name'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('name')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">邮箱</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" >
                        @if($errors->first('email'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('email')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">密码</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="password" >
                        @if($errors->first('password'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('password')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">确认密码</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="password_confirmation" >
                        @if($errors->first('password_confirmation'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('password_confirmation')}}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default">确认添加</button>
                </form>
            </div>
        </div>
    </div>

@endsection