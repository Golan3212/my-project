<?php $n = $news ?>
<form action='<?=route('news.show', $n['id'])?>' method='post' style="flex-direction: column">
    <label><?=$n['title']?>
        <input type="text" placeholder="ВВедите название"/>
    </label>
    <label><?=$n['author']?>
        <input type="text" placeholder="ВВедите имя автора"/>
    </label>
    <textarea rows="5" cols="20"><?=$n['description']?>Опишите новость подробнее</textarea>
    <input type="submit" />
</form>


