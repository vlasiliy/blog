<div class="article">
    <h2><?php echo $post->getTitle() ?></h2>
    <div class="clr"></div>
    <p>
        <span class="date"><?php echo format_date($post->getCreatedAt(), 'D') ?></span>&nbsp;|&nbsp;Тэги:
        <?php foreach ($post->getTagsPost($post->getId()) as $tag): ?>
            <a href="<?php echo url_for('post/tag?id='.$tag->getId()) ?>"><?php echo $tag->getWord() ?></a>&nbsp;
        <?php endforeach; ?>
    </p>
    <?php echo $post->getContentPath1(ESC_RAW).$post->getContentPath2(ESC_RAW) ?>
    <div class="comment">
        <div class="title_comment"><a name="comments">Коментарии:</a></div>
        <div class="comments">
            <?php foreach ($comments as $comment): ?>
                <strong>
                    <?php echo $comment->getSf_guard_user()->getUsername() ?>&nbsp;(<?php echo $comment->getCreatedAt() ?>):
                </strong><br />
                <?php echo $comment->getText() ?><br /><br />
            <?php endforeach; ?>
        </div>
        <?php if ($sf_user->isAuthenticated()): ?>
            <div class="title_comment">Добавить коментарии:</div>
                <form action="<?php echo url_for('post/submit?id='.$post->getId()) ?>#comments" method="POST">
                    <?php echo $form  ?>
                    <br />
                    <input type="submit" value="отправить" />
                </form>
        <?php endif ?>
    </div>
</div>