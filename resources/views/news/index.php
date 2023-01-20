
<?php foreach ($news as $n): ?>
<div style="background-color: cadetblue; border: 1px solid darkred  ">
    <h2> <?=$n['title']?></h2>
    <p> <?=$n['description']?></p>
    <address> <?=$n['author']?>
        <i> <?=$n['created_at']?></i>
        <a href="<?=route('news.show', $n['id'])?>">Далее</a>
    </address>
</div>
<?php endforeach; ?>

