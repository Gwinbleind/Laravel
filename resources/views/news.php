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
<p>Горячие новости</p>
<?php /** @var array $news */
foreach ($news as $article):?>
    <a href="<?=route('news.oneArticle',$article['id'])?>">
        <?=$article['title']?>
    </a>
    <br>
<?php endforeach?>
</body>
</html>
