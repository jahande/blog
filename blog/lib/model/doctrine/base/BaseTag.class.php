<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Tag', 'doctrine');

/**
 * BaseTag
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $article_id
 * @property string $name
 * @property Article $Article
 * 
 * @method integer getId()         Returns the current record's "id" value
 * @method integer getArticleId()  Returns the current record's "article_id" value
 * @method string  getName()       Returns the current record's "name" value
 * @method Article getArticle()    Returns the current record's "Article" value
 * @method Tag     setId()         Sets the current record's "id" value
 * @method Tag     setArticleId()  Sets the current record's "article_id" value
 * @method Tag     setName()       Sets the current record's "name" value
 * @method Tag     setArticle()    Sets the current record's "Article" value
 * 
 * @package    blog_admin_system
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTag extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tag');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('article_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Article', array(
             'local' => 'article_id',
             'foreign' => 'id'));
    }
}