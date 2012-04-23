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

<?if($posts->haveToPaginate()):?>
         <div class="pager">
         <?foreach($posts->getLinks() as $page):?>
              <a href="<?=url_for('post/index/?page='.$page)?>"><span><?=$page?></span></a>
         <?endforeach;?>
         </div>
<?endif;?>

<p class="pages"><small>Страница 1 из 2 &nbsp;&nbsp;&nbsp;</small> <span>1</span> <a href="#">2</a> <a href="#">&raquo;</a></p>