<?php

class CommentPostForm extends sfForm
{
  public function configure()
  {
    /*
    $this->setWidgets(array(
      'text'    => new sfWidgetFormTextarea()
    ));
     * 
     */
      
      $this->widgetSchema['text'] = new sfWidgetFormCKEditor(array(
          'jsoptions'=>array(
              'extraPlugins' => 'autogrow',
              'toolbarCanCollapse' => false,
              'toolbar' => array(array('Bold', 'Italic', 'NumberedList', 'BulletedList', 'Link', 'Inlink', 'Smiley'))

          )
      ));
      $this->widgetSchema['text']->setLabel('Добавить коментарий:');
      
  }
}

