<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','coco') - coco</title>
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
</head>

<body>
    @include('layouts._header')
    @include('shared._messages')
    @yield('content')
    <script src="{{mix('/js/app.js')}}"></script>
</body>

</html>
