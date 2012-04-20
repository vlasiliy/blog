<?php

/**
 * Post
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    blog
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Post extends BasePost
{
    
    public function getTagsPost($id_post)
    {
        $q = Doctrine_Query::create()
                ->select('t.*')
                ->from('Tag t')
                ->leftJoin('t.TagPost tp')
                ->andWhere('tp.post_id = ?', $id_post);
 
        return $q->execute();
    }
    
    public function getCountComment($id_post)
    {
        $q = Doctrine_Query::create()
                ->select('count(c.id) as countcomments')
                ->from('Comment c')
                ->where('c.post_id = ?', $id_post);
 
        return $q->execute(array(), Doctrine_Core::HYDRATE_SINGLE_SCALAR);
    }
    
    public static function getPopularPosts()
    {
        $q = Doctrine_Query::create()
                ->select('title')
                ->from('Post p')
                ->limit(sfConfig::get('app_max_post_on_popular'))
                ->orderBy('rating DESC');
 
        return $q->execute();
    }
    
}
