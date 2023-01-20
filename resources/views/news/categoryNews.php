<?php $n = $categoryNews ?>
<h2> <?=$n['category']?></h2>
<?php foreach ($n['news'] as $news): ?>
<div style="background-color: cadetblue; border: 1px solid darkred  ">
    <h3> <?=$news['title']?></h3>
    <address> <?=$news['author']?>
        <i> <?=$news['created_at']?></i>
        <a href="<?=route('news.show', $news['id'])?>">Далее</a>
    </address>
</div>
<?php endforeach; ?>
