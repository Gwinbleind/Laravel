<?php
/** @var array $news */
foreach ($news as $article):?>
    <a href="<?=route('news.oneArticle',$article['slug'])?>">
        <?=$article['title']?>
    </a>
    <br>
<?php endforeach?>
