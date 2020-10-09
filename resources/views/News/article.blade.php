<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
</head>
<body>
@include ("menu")
@isset($article)
    Новость № {{$article['id']}}
    <h2>{{$article['title']}}</h2>
    {{$article['body']}}
@endisset
@empty($article)
    <h2>Новость не найдена</h2>
    <a href="{{route('news.all')}}">К новостям</a>
@endempty
</body>
</html>
