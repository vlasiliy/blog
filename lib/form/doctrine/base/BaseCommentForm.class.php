<?php

/**
 * Comment form base class.
 *
 * @method Comment getObject() Returns the current form's model object
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCommentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'post_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Post'), 'add_empty' => false)),
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'text'             => new sfWidgetFormTextarea(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'post_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Post'))),
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'text'             => new sfValidatorString(array('max_length' => 1024)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comment';
  }

}
