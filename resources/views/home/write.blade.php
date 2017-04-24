<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('home/css/bootstrap.css')}}">
    <title>Document</title>
    <style></style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            {{csrf_field()}}
            章节名：{{ $errors ->first('title') }}
            <input type="text" class="form-control" name="title" ><br>
            内容：{{ $errors ->first('url') }}
            <textarea name="url" id="" cols="100" rows="15" class="form-control"></textarea>
            <br>
            <input type="submit" class="btn btn-success">
        </form>
    </div>
</body>
</html>