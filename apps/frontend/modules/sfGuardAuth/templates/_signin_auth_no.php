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