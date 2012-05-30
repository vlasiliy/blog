<script type="text/javascript">
  $(function(){
    $("#signinForm").ajaxForm({
      url: '<?php echo url_for('@sf_guard_signin') ?>',
      type: 'post',
      dataType: 'json',
      beforeSubmit: function(){
        $("#signinSubmit").attr("disable",true);
      },
      success: function(data) {
        $("#signinSubmit").attr("disable",false);
        $("#signinLoader").hide();
        if (data=='error')
        {
          alert('Ошибка ввода логина/пароля!');
        }
        else if (data=='ok')
        {
          document.location.reload();
        }
      }
    })
  })
</script>

<div class="searchform">
    <h2 class="star"><span>Авторизация</span></h2>
    <form id="signinForm" name="signinForm" method="post" <?php echo url_for('@sf_guard_signin') ?>>
        <?php echo $form->renderHiddenFields()?>
        <span>
        <?php echo $form['username']->render(array('class'=>'editbox_login','id'=>'login_username','maxlenght'=>'80','alt'=>'Username','value'=>'логин:','onfocus'=>'OnFocusInput("login_username", "логин:");','onblur'=>'OutFocusInput("login_username", "логин:");')) ?>
        </span>
        <br />
        <span>
        <?php echo $form['password']->render(array('class'=>'editbox_search','id'=>'login_password','alt'=>'Password','value'=>'пароль:','onfocus'=>'OnFocusInput("login_password", "пароль:");','onblur'=>'OutFocusInput("login_password", "пароль:");')) ?>
        </span>
        <input id="signinSubmit" name="signinSubmit" src="/images/go.gif" class="button_search" type="image" />
        <img src="/images/loader.gif" style="padding-left:10px;display:none;" id="signinLoader">
    </form>
    <a href="<?php echo url_for('@sf_guard_register') ?>" class="reg">Регистрация</a><br />
    <a href="<?php echo url_for('@sf_guard_forgotpass') ?>" class="reg">Забыли пароль?</a>
</div>
<div class="gadget"><div class="clr"></div></div>
