@extends('layouts.master')
@section('js')
    <script src="{{url('/admin/js/jquery-1.8.3.min.js')}}"></script>
    <script>
        $(function(){
            $.ajax({
                url:'http://laravel-s60.dev/admin/book/cate',
                type:'get',
                data:{
                    '_token':'{{csrf_token()}}'
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    var boss = document.getElementById('boss');
                    var son = document.getElementById('son');
                    for(var i in data){
                        if(data[i].path == '0,'){
//                            alert(data[i].id);
//                            boss.add(new Option(data[i].name,data[i].id));

                                $("#boss").append("<option value='"+data[i].id+"'>"+data[i].name+"</option>");
                        }
                    }

                    //然后根据省份的选择决定 城市和区的显示内容
                    boss.onchange = function(){
                        //将之前的清空
                        son.length = 0;
                        var index = boss.value;

                        for(var j in data){

                            if(data[j].pid == index){
//                                son.add(new Option(data[j].name,data[j].id));

                                    $("#son").append("<option value='"+data[j].id+"'>"+data[j].name+"</option>");
                            }
                        }
                    }


                    //在页面载入完成后 自动触发一次选择
                    boss.onchange();
                },
                error:function(){
                    alert("失败");
                },
                dataType:'json',
                async: false
            });

        })

    </script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{url('admin/book/doAdd')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">书名</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="title" >
                        @if($errors->first('title'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('title')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">分类</label>
                        <select name="" id="boss"></select>
                        <select name="c_id" id="son"></select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">封面</label>
                        <input type="file"   name="icon" >
                        @if($errors->first('icon'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('icon')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">价格</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="price" >
                        @if($errors->first('price'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('price')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">描述</label>
                        <textarea name="desc" id="" cols="40" rows="10"></textarea>
                        @if($errors->first('desc'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$errors->first('desc')}}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default">确认添加</button>
                </form>
            </div>
        </div>
    </div>

@endsection
