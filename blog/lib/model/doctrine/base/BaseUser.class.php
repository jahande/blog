<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('User', 'doctrine');

/**
 * BaseUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $user_name
 * @property string $password
 * @property string $credential
 * 
 * @method integer getId()         Returns the current record's "id" value
 * @method string  getUserName()   Returns the current record's "user_name" value
 * @method string  getPassword()   Returns the current record's "password" value
 * @method string  getCredential() Returns the current record's "credential" value
 * @method User    setId()         Sets the current record's "id" value
 * @method User    setUserName()   Sets the current record's "user_name" value
 * @method User    setPassword()   Sets the current record's "password" value
 * @method User    setCredential() Sets the current record's "credential" value
 * 
 * @package    blog_admin_system
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('user_name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('password', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('credential', 'string', 255, array(
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
        
    }
}