<?php if ($sf_user->isAuthenticated()): ?>
  <?php include_partial('sfGuardAuth/signin_auth_yes') ?>
<?php else: ?>
  <?php include_partial('sfGuardAuth/signin_auth_no',array('form'=>$form)) ?>
<?php endif ?>