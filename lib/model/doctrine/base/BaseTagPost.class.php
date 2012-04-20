<?php

/**
 * BaseTagPost
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $post_id
 * @property integer $tag_id
 * @property Post $Post
 * @property Tag $Tag
 * 
 * @method integer getPostId()  Returns the current record's "post_id" value
 * @method integer getTagId()   Returns the current record's "tag_id" value
 * @method Post    getPost()    Returns the current record's "Post" value
 * @method Tag     getTag()     Returns the current record's "Tag" value
 * @method TagPost setPostId()  Sets the current record's "post_id" value
 * @method TagPost setTagId()   Sets the current record's "tag_id" value
 * @method TagPost setPost()    Sets the current record's "Post" value
 * @method TagPost setTag()     Sets the current record's "Tag" value
 * 
 * @package    blog
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTagPost extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tag_post');
        $this->hasColumn('post_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('tag_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Post', array(
             'local' => 'post_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Tag', array(
             'local' => 'tag_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}