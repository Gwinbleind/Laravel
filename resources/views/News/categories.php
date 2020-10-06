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
<p>Категории</p>
<?php /** @var array $categories */
foreach ($categories as $category):?>
    <a href="<?=route('news.byCategory',$category['slug'])?>">
        <?=$category['name']?>
    </a>
    <br>
<?php endforeach;?>
</body>
</html>
