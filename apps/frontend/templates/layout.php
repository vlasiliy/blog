<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
        <!-- START PAGE SOURCE -->
        <div class="main">
        <div class="header">
            <div class="header_resize">
            <div class="menu_nav">
                <ul>
                    <li class="active"><a href="<?php echo url_for('@homepage') ?>">Блог</a></li>
                    <li><a href="/about">О себе</a></li>
                    <li><a href="/contact">Контакты</a></li>
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
                    <form id="formsearch" name="formsearch" method="post" action="#">
                        <span>
                        <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Поиск по сайту:" type="text" />
                        </span>
                        <input name="button_search" src="/images/search_btn.gif" class="button_search" type="image" />
                    </form>
                </div>
                <div class="gadget"><div class="clr"></div></div>
                <div class="searchform">
                    <h2 class="star"><span>Авторизация</span></h2>
                    <form id="formauth" name="formauth" method="post" action="#">
                        <span>
                        <input name="editbox_login" class="editbox_login" id="editbox_login" maxlength="80" value="логин:" type="text" />
                        </span>
                        <br />
                        <span>
                        <input type="password" name="editbox_pass" class="editbox_search" id="editbox_pass" maxlength="80" value="пароль" type="text" />
                        </span>
                        <input name="button_pass" src="/images/go.gif" class="button_search" type="image" />
                    </form>
                </div>
                <div class="gadget"><div class="clr"></div></div>
                <div class="gadget">
                <h2 class="star"><span>Облако</span></h2>
                <?php foreach (Tag::getCloudTags() as $tag): ?>
                <a href="#"><?php echo $tag->getWord() ?></a>
                <?php endforeach; ?>
                </div>
                <div class="gadget">
                    <h2 class="star"><span>Популярные</span></h2>
                    <div class="clr"></div>
                    <ul class="ex_menu">
                    <?php foreach (Post::getPopularPosts() as $ppost): ?>
                        <li><a href="#"><?php echo $ppost->getTitle() ?></a></li>
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
