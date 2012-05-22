<?php

class SearchForm extends sfForm
{
  public function configure()
  {
    /*
    $this->setWidgets(array(
      'text'    => new sfWidgetFormTextarea()
    ));
     * 
     */
      
      $this->widgetSchema['search'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
      
  }
}

