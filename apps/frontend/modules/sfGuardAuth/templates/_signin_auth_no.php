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
<form id="signinForm" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
<?php echo $form->renderHiddenFields()?>
<?php echo $form['username']->render(array('class'=>'inputbox','id'=>'login_username','size'=>'10','alt'=>'Username')) ?>
<?php echo $form['password']->render(array('class'=>'inputbox','id'=>'login_password','size'=>'10','alt'=>'Password')) ?>
<input id="signinSubmit" class="button" type="submit" name="Submit" value="Submit" />
</form>



<!--
                <div class="searchform">
                    <h2 class="star"><span>Авторизация</span></h2>
                    <form id="formauth" name="formauth" method="post" action="<?php echo url_for('@sf_guard_signin') ?>">
                        <?php echo $form->renderHiddenFields()?>
                        <?php echo $form['username']->renderError() ?>
                        <?php echo $form['password']->renderError() ?>
                        <span>
                        <!--<input name="username" class="editbox_login" id="username" maxlength="80" value="логин:" type="text" />-->
                        <?php echo $form['username']->render() ?>
                        </span>
                        <br />
                        <span>
                        <!--<input type="password" name="editbox_pass" class="editbox_search" id="editbox_pass" maxlength="80" value="пароль" type="text" />-->
                        <?php echo $form['password']->render() ?>    
                        </span>
                        <input name="signinSubmit" id="signinSubmit" src="/images/go.gif" class="button_search" type="image" />
                        <img src="/images/loader.gif" style="padding-left:10px;display:none;" id="signinLoader">
                    </form>
                    <a href="<?php echo url_for('@homepage') ?>registration" class="reg">Регистрация</a>
                    <a href="<?php echo url_for('@homepage') ?>reсpass" class="reg">Забыли пароль?</a>
                </div>
-->