@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">书名</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{$book->title}}">
                        @if($errors->first('title'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('title')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">价格</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="price" value="{{$book->price}}">
                        @if($errors->first('price'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('price')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">标签</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="type" value="{{$book->type}}">
                        @if($errors->first('type'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('type')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">描述</label>
                        <textarea name="desc" id="" cols="30" rows="10">{{$book->desc}}</textarea>
                        @if($errors->first('desc'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('desc')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">图片</label>
                        <input type="file"  name="icon">
                        @if($errors->first('icon'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('icon')}}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default">确认修改</button>
                </form>
            </div>
        </div>
    </div>

@endsection