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
      
      $this->widgetSchema['search'] = new sfWidgetFormCKEditor(array(
          'jsoptions'=>array(
              'extraPlugins' => 'autogrow',
              'toolbarCanCollapse' => false,
              'toolbar' => array(array('Bold', 'Italic', 'NumberedList', 'BulletedList', 'Link', 'Inlink', 'Smiley'))

          )
      ));
      $this->widgetSchema['text']->setLabel('Добавить коментарий:');
      
  }
}

