<?php

/**
 * User filter form base class.
 *
 * @package    blog_admin_system
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'password'   => new sfWidgetFormFilterInput(),
      'credential' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'password'   => new sfValidatorPass(array('required' => false)),
      'credential' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'user_name'  => 'Text',
      'password'   => 'Text',
      'credential' => 'Text',
    );
  }
}
