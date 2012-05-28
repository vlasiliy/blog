<?php

/**
 * TagPost form base class.
 *
 * @method TagPost getObject() Returns the current form's model object
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTagPostForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'post_id' => new sfWidgetFormInputHidden(),
      'tag_id'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'post_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('post_id')), 'empty_value' => $this->getObject()->get('post_id'), 'required' => false)),
      'tag_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('tag_id')), 'empty_value' => $this->getObject()->get('tag_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tag_post[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TagPost';
  }

}
