<?php

/**
 * Tag form.
 *
 * @package    blog_admin_system
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TagForm extends BaseTagForm
{
  public function configure()
  {
  	$this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'article_id' => new sfWidgetFormInputText(),
      'name'       => new sfWidgetFormInputText(),
  	  
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'article_id' => new sfValidatorString(array('max_length' => 3, 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      '_csrf_token'=> new sfValidatorCSRFToken(array('required' => false,'token' => 'abc')),
    ));
  }
}
