<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include "menu.php";
?>
Горячие новости
<?php /** @var array $news */
foreach ($news as $article):?>
    <a href="<?=route('news',$article['id'])?>"><?=$article['title']?></a>
<?php endforeach?>
</body>
</html>
