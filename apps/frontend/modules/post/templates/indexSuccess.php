<?php foreach ($posts as $post): ?>
<div class="article">
    <h2><?php echo $post->getTitle() ?></h2>
    <div class="clr"></div>
    <p><span class="date"><?php echo format_date($post->getCreatedAt(), 'D', 'ru') ?></span> &nbsp;|&nbsp; Тэги: <a href="#">templates</a>, <a href="#">internet</a></p>
    <?php echo $post->getContentPath1(ESC_RAW) ?>
    <p class="spec"><a href="#" class="rm">Далее... &raquo;</a> <a href="#" class="com"><span>11</span> Коментариев</a></p>
</div>
<?php endforeach; ?>

<p class="pages"><small>Страница 1 из 2 &nbsp;&nbsp;&nbsp;</small> <span>1</span> <a href="#">2</a> <a href="#">&raquo;</a></p>