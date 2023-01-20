
<?php foreach ($categoryNews as $categoryNew) :?>
<div style="background-color: cadetblue; border: 1px solid darkred  ">
    <h2> <?=$categoryNew['category']?></h2>
   <?php foreach ($categoryNew['news'] as $newsFromCategory) :?>
    <address> <?=$newsFromCategory['title']?></address>
   <?php endforeach; ?>
    <a href="<?=route('news.categoryNews', $categoryNew['id'])?>">Далее</a>
</div>
<?php endforeach; ?>

