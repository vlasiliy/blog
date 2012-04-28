<?php

/**
 * BasesfGuardRegisterForm for registering new users
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id: BasesfGuardChangeUserPasswordForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class BasesfGuardRegisterForm extends sfGuardUserAdminForm
{
  public function setup()
  {
    parent::setup();

    //$this->widgetSchema->setLabel('username', 'Имя пользователя');
    
    unset(
      $this['is_active'],
      $this['is_super_admin'],
      $this['updated_at'],
      $this['groups_list'],
      $this['permissions_list']
    );

    $this->widgetSchema->setLabel('first_name', 'Имя');
    $this->widgetSchema->setLabel('last_name', 'Фамилия');
    $this->widgetSchema->setLabel('email_address', 'Email адрес');
    $this->widgetSchema->setLabel('username', 'Имя пользователя');
    $this->widgetSchema->setLabel('password', 'Пароль');
    $this->widgetSchema->setLabel('password_again', 'Повторить пароль');
    
<    $this->validatorSchema['password']->setOption('required', true);
    
    $this->setValidators(array(
      'first_name'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'last_name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email_address'    => new sfValidatorEmail(array(), array('invalid' => 'Ошибка'))
    ));        
  }
}