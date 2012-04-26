<?php

//require_once(dirname(__FILE__)."/../../../../../plugins/sfDoctrineGuardPlugin/modules/sfGuardRegister/lib/BasesfGuardRegisterActions.class.php");
require_once(sfConfig::get('sf_plugins_dir').'/sfDoctrineGuardPlugin/modules/sfGuardRegister/lib/BasesfGuardRegisterActions.class.php');

class sfGuardRegisterActions extends BasesfGuardRegisterActions
{
  public function executeIndex()
  {
//      return $this->renderText('This is a new sfGuardRegister action.');
    //return $this->redirect('@homepage');
  }
}