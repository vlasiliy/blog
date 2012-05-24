<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <script>
        function OnFocusInput(id, message)
        {
            if(document.getElementById(id).value == message)
                {
                    document.getElementById(id).value = '';
                }
        }
        
        function OutFocusInput(id, message)
        {
            if(document.getElementById(id).value == '')
                {
                    document.getElementById(id).value = message;
                }
        }
    </script>
  </head>
  <body>
        <!-- START PAGE SOURCE -->
        <div class="main">
        <div class="header">
            <div class="header_resize">
            <div class="menu_nav">
                <ul>
                    <li><a href="<?php echo url_for('@homepage') ?>">Блог</a></li>
                    <li><a href="<?php echo url_for('@homepage') ?>about">О себе</a></li>
                    <li><a href="<?php echo url_for('@homepage') ?>contact">Контакты</a></li>
                </ul>
            </div>
            <div class="logo">
                <h1><a href="<?php echo url_for('@homepage') ?>">коротко о <span>Symfony</span></a> <small>записки одного программиста</small></h1>
            </div>
            <div class="clr"></div>
            </div>
        </div>
        <div class="content">
            <div class="content_resize">
            <div class="mainbar">
                <?php echo $sf_content ?>
            </div>
            <div class="sidebar">
                <div class="searchform">
                    <form id="formsearch" name="formsearch" method="post" action="<?php echo url_for('@post_serach') ?>">
                        <span>
                        <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Поиск по сайту:" type="text" onfocus="OnFocusInput('editbox_search', 'Поиск по сайту:');" />
                        </span>
                        <input name="button_search" src="/images/search_btn.gif" class="button_search" type="image" />
                    </form>
                </div>
                <div class="gadget"><div class="clr"></div></div>
                <?php include_component('sfGuardAuth','signin') ?>
                <div class="gadget">
                <h2 class="star"><span>Облако</span></h2>
                <?php foreach (Tag::getCloudTags() as $tag): ?>
                    <a href="<?php echo url_for('post/tag?id='.$tag->getId()) ?>"><?php echo $tag->getWord() ?></a>
                <?php endforeach; ?>
                </div>
                <div class="gadget">
                    <h2 class="star"><span>Популярные</span></h2>
                    <div class="clr"></div>
                    <ul class="ex_menu">
                    <?php foreach (Post::getPopularPosts() as $ppost): ?>
                        <li><a href="<?php echo url_for('post/show?id='.$ppost->getId()) ?>"><?php echo $ppost->getTitle() ?></a></li>
                    <?php endforeach; ?> 
                    </ul>
                </div>
            </div>
            <div class="clr"></div>
            </div>
            <div class="clr"></div>
        </div>
        <div class="footer">
            <div class="footer_resize">
            <p class="lf">Copyright &copy; 2010 <a href="#">SiteName</a> - All Rights Reserved</p>
            <p class="rf"><a href="http://www.free-css.com/">Free CSS Templates</a> by <a href="http://www.coolwebtemplates.net/">Cool Website Templates</a></p>
            <div class="clr"></div>
            </div>
        </div>
        </div>
        <!-- END PAGE SOURCE -->
  </body>
</html>
