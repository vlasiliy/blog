<?php

/**
 * Tag
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    blog
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Tag extends BaseTag
{
    public static function getCloudTags()
    {
        $q = Doctrine_Query::create()
             ->select('word, count(id) c')
             ->from('Tag t')
             ->groupBy('word')
             ->orderBy('c DESC');
        
        return $q->execute();
    }
    
    /*
    public static function getCountTags()
    {
        $q = Doctrine_Query::create()
             ->select('count(id) c')
             ->from('Tag t')
             ->orderBy('c DESC');
    }
    */
}
