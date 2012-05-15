<?php
 
/**
* sfValidatorEmailMx validates emails width mx record.
*
* @package  symfony
* @subpackage validator
* @author   vlasiliy
*/
class sfValidatorEmailUnique extends sfValidatorEmail
{
 /**
  * @see sfValidatorEmail
  */
    protected function configure($options = array(), $messages = array())
    {
        parent::configure($options, $messages);
        $this->addMessage('unique_error', 'Адресс уже используется.');
        $this->addMessage('found_error', 'Адресс отсутствует.');
        
        $this->addOption('is_unique');
    }
 
    protected function doClean($value)
    {
        $value = parent::doClean($value);

        $count = Doctrine_Core::getTable('sfGuardUser')->findBy('email_address', $value)->count();
        
        if($this->getOption('is_unique'))
        {
            if ($count == 0)
            {
                return $value;
            }
            else
            {
                throw new sfValidatorError($this, 'unique_error', array());
            }
        }
        else
        {
            if ($count == 0)
            {
                throw new sfValidatorError($this, 'found_error', array());
            }
            else
            {
                return $value;
            }
        }    
    }
 
}