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
                <li class="active"><a href="index.html">Главная</a></li>
                <li><a href="about.html">О себе</a></li>
                <li><a href="blog.html">Блог</a></li>
                <li><a href="contact.html">Контакты</a></li>
                </ul>
            </div>
            <div class="logo">
                <h1><a href="index.html">коротко о <span>Symfony</span></a> <small>записки одного программиста</small></h1>
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
                <a href="#">слово</a>
                <a href="#">ещеслово</a>
                <a href="#">слово</a>
                <a href="#">ещеслово</a>
                <a href="#">слово</a>
                <a href="#">ещеслово</a>
                <a href="#">слово</a>
                <a href="#">ещеслово</a>
                </div>
                <div class="gadget">
                <h2 class="star"><span>Популярные</span></h2>
                <div class="clr"></div>
                <ul class="ex_menu">
                    <li><a href="#">Lorem ipsum dolor</a><br />
                    Donec libero. Suspendisse bibendum</li>
                    <li><a href="#">Dui pede condimentum</a><br />
                    Phasellus suscipit, leo a pharetra</li>
                    <li><a href="#">Condimentum lorem</a><br />
                    Tellus eleifend magna eget</li>
                    <li><a href="#">Fringilla velit magna</a><br />
                    Curabitur vel urna in tristique</li>
                    <li><a href="#">Suspendisse bibendum</a><br />
                    Cras id urna orbi tincidunt orci ac</li>
                    <li><a href="#">Donec mattis</a><br />
                    purus nec placerat bibendum</li>
                </ul>
                </div>
            </div>
            <div class="clr"></div>
            </div>
            <div class="clr"></div>
            </div>
        </div>
        <div class="fbg">
            <div class="fbg_resize">
            <div class="col c1">
                <h2><span>Image Gallery</span></h2>
                <a href="#"><img src="/images/pix1.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="/images/pix2.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="/images/pix3.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="/images/pix4.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="/images/pix5.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="/images/pix6.jpg" width="58" height="58" alt="" /></a>
            </div>
            <div class="col c2">
                <h2><span>Lorem Ipsum</span></h2>
                <p>Lorem ipsum dolor<br />
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. <a href="#">Morbi tincidunt, orci ac convallis aliquam</a>, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam.</p>
            </div>
            <div class="col c3">
                <h2><span>Contact</span></h2>
                <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue.</p>
                <p><a href="#">support@yoursite.com</a></p>
                <p>+1 (123) 444-5677<br />
                +1 (123) 444-5678</p>
                <p>Address: 123 TemplateAccess Rd1</p>
            </div>
            <div class="clr"></div>
            </div>
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
