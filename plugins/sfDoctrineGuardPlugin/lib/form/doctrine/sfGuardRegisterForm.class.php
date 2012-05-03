<?php

/**
 * sfGuardRegisterForm for registering new users
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id: BasesfGuardChangeUserPasswordForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardRegisterForm extends BasesfGuardRegisterForm
{
  /**
   * @see sfForm
   */
  public function configure()
  {
      
    
    unset($this['id']);
      
    $this->widgetSchema->setLabels(array(
        'first_name'     => 'Имя',
        'last_name'      => 'Фамилия',
        'email_address'  => 'Email адрес',
        'username'       => 'Имя пользователя',
        'password'       => 'Пароль',
        'password_again' => 'Повторить пароль'
    ));

    $this->setValidators(array(
      'first_name'       => new sfValidatorString(array('max_length' => 255, 'min_length' => 4, 'required' => true)),
      'last_name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email_address'    => new sfValidatorEmail(array(), array('invalid' => 'Ошибка')),
      'username'         => new sfValidatorString(array('max_length' => 255, 'min_length' => 4, 'required' => true)),
      'password'         => new sfValidatorString(array('max_length' => 20, 'min_length' => 6, 'required' => true)),
      'password_again'   => new sfValidatorString(array('max_length' => 20, 'min_length' => 6, 'required' => true))
    ));
    
      
  }
}