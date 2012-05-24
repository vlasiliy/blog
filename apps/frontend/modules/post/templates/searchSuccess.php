<div class="article">
    <h2>Результаты поиска</h2>
    <h4><?php echo $message ?></h4>
    
    <p>
    <?php foreach ($posts as $id => $post): ?>
        <a href="<?php echo url_for('post/show?id='.$post->getId()) ?>" class="rm"><?php echo $post->getTitle() ?></a><br />
    <?php endforeach; ?>
    </p>

</div>