<?php foreach ($posts as $id => $post): ?>
<div class="article">
    <h2><?php echo $post->getTitle() ?></h2>
    <div class="clr"></div>
    <p>
        <span class="date"><?php echo format_date($post->getCreatedAt(), 'D') ?></span>&nbsp;|&nbsp;Тэги:
        <?php foreach ($post->getTagsPost($post->getId()) as $tag): ?>
            <a href="<?php echo url_for('post/tag?id='.$tag->getId()) ?>"><?php echo $tag->getWord() ?></a>&nbsp;
        <?php endforeach; ?>
    </p>
    <?php echo $post->getContentPath1(ESC_RAW) ?>
    <p class="spec">
        <a href="<?php echo url_for('post/show?id='.$post->getId()) ?>" class="rm">Далее... &raquo;</a>
        <a href="<?php echo url_for('post/show?id='.$post->getId()) ?>#comments" class="com">
            <span><?php echo $post->getCountComment($post->getId()) ?></span> Коментариев
        </a>
    </p>
</div>
<?php endforeach; ?>

<p class="pages">

    <small>Страница <?php echo $posts->getPage() ?> из <?php echo $posts->getLastPage() ?> &nbsp;&nbsp;&nbsp;</small>
    
<?php if ($posts->haveToPaginate()): ?>

    <a href="<?php echo url_for($route) ?>?page=1">&laquo;</a>

    <a href="<?php echo url_for($route) ?>?page=<?php echo $posts->getPreviousPage() ?>">&#8249;</a>

    <?php foreach ($posts->getLinks() as $page): ?>
      <?php if ($page == $posts->getPage()): ?>
        <span><?php echo $page ?></span>
      <?php else: ?>
        <a href="<?php echo url_for($route) ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>

    <a href="<?php echo url_for($route) ?>?page=<?php echo $posts->getNextPage() ?>">&#8250;</a>

    <a href="<?php echo url_for($route) ?>?page=<?php echo $posts->getLastPage() ?>">&raquo;</a>

<?php endif; ?>

</p>