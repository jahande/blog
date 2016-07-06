<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Article', 'doctrine');

/**
 * BaseArticle
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $like_
 * @property integer $dislike
 * @property string $title
 * @property string $content
 * @property timestamp $created_at
 * @property Doctrine_Collection $Comment
 * @property Doctrine_Collection $Tag
 * 
 * @method integer             getId()         Returns the current record's "id" value
 * @method integer             getLike_()      Returns the current record's "like_" value
 * @method integer             getDislike()    Returns the current record's "dislike" value
 * @method string              getTitle()      Returns the current record's "title" value
 * @method string              getContent()    Returns the current record's "content" value
 * @method timestamp           getCreatedAt()  Returns the current record's "created_at" value
 * @method Doctrine_Collection getComment()    Returns the current record's "Comment" collection
 * @method Doctrine_Collection getTag()        Returns the current record's "Tag" collection
 * @method Article             setId()         Sets the current record's "id" value
 * @method Article             setLike_()      Sets the current record's "like_" value
 * @method Article             setDislike()    Sets the current record's "dislike" value
 * @method Article             setTitle()      Sets the current record's "title" value
 * @method Article             setContent()    Sets the current record's "content" value
 * @method Article             setCreatedAt()  Sets the current record's "created_at" value
 * @method Article             setComment()    Sets the current record's "Comment" collection
 * @method Article             setTag()        Sets the current record's "Tag" collection
 * 
 * @package    blog_admin_system
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseArticle extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('article');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('like_', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('dislike', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('content', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Comment', array(
             'local' => 'id',
             'foreign' => 'article_id'));

        $this->hasMany('Tag', array(
             'local' => 'id',
             'foreign' => 'article_id'));
    }
}