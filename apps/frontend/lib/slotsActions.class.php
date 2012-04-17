<?php


class slotsActions extends sfActions
{
    public function __construct()
    {
        $this->getCloudTags();
    }
    
    public function getCloudTags()
    {
        $this->tags = Doctrine_Core::getTable('Tag')
           ->createQuery('b')
           ->execute();
    }
}
