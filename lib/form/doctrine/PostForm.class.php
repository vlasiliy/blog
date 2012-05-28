<?php

/**
 * Post form.
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PostForm extends BasePostForm
{
  public function configure()
  {
      
      $this->widgetSchema['title']->setAttributes(array('style' => 'width:400px;'));
      $this->widgetSchema['content_path1'] = new sfWidgetFormCKEditor(array(
          'jsoptions'=>array(
              'extraPlugins' => 'autogrow',
              'toolbarCanCollapse' => false
          )
      ));
      $this->widgetSchema['content_path2'] = new sfWidgetFormCKEditor(array(
          'jsoptions'=>array(
              'extraPlugins' => 'autogrow',
              'toolbarCanCollapse' => false
          )
      ));
      
      unset($this->validatorSchema['created_at']);
      unset($this->validatorSchema['updated_at']);
      
      $this->widgetSchema['tags'] = new sfWidgetFormInput();
      $this->setDefault('tags', $this->getObject()->getTags());
      
      $this->validatorSchema->setOption('allow_extra_fields', true);
      $this->validatorSchema->setOption('filter_extra_fields', false);
      
      $this->widgetSchema->setNameFormat('post[%s]');
      
  }
  
  public function postSave($con = null)
  {
      $this->getObject()->setPostTags($this->getObject()->tags_id);
  }
  
  public function saveEmbeddedForms($con = null, $forms = null)
  {
     $this->postSave();
     parent::saveEmbeddedForms();   
  }
}
