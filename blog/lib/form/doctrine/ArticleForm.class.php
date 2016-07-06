<?php

/**
 * Article form.
 *
 * @package    blog_admin_system
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleForm extends BaseArticleForm
{
  public function configure()
  {
  	$this->setValidator('created_at',new sfValidatorInteger(array('required' => false)));
  }
}
