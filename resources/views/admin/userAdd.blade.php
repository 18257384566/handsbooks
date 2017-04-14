@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{url('admin/user/doAdd')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">姓名</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" >
                        @if($errors->first('name'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('name')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">年龄</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="age" >
                        @if($errors->first('age'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('age')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">班期</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="grade" >
                        @if($errors->first('grade'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('grade')}}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default">确认添加</button>
                </form>
            </div>
        </div>
    </div>

@endsection