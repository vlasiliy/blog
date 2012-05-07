<?php

class CommentPostForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'text'    => new sfWidgetFormTextarea()
    ));
  }
}

