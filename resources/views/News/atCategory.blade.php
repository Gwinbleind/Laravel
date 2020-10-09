<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
</head>
<body>
@include ("menu")
<h2>Новости в категории "{{$category['name']}}"</h2>
@include ('News.newsBlock')
</body>
</html>
