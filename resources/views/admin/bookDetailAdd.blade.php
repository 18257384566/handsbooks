@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{url('admin/book/detailadd/'.$b_id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">章节名称</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="title" >
                        @if($errors->first('title'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('title')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">章节内容</label>
                        <input type="file" class="form-control" id="exampleInputPassword1" name="url" >
                        @if($errors->first('url'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('url')}}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default">确认添加</button>
                </form>
            </div>
        </div>
    </div>

@endsection