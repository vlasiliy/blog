<?php

/**
 * Comment form.
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommentForm extends BaseCommentForm
{
  public function configure()
  {
      $this->widgetSchema['text'] = new sfWidgetFormCKEditor(array(
          'jsoptions'=>array(
              'extraPlugins' => 'autogrow',
              'toolbarCanCollapse' => false,
              'toolbar' => array(array('Bold', 'Italic', 'NumberedList', 'BulletedList', 'Link', 'Inlink', 'Smiley'))

          )
      ));
  }
}
