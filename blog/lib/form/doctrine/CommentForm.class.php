<?php

/**
 * Comment form.
 *
 * @package    blog_admin_system
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommentForm extends BaseCommentForm
{
  public function configure()
  {
  
    // ...
 
    unset($this['created_at'],$this['like_'],$this['dislike'],$this['article_id']);//, $this['updated_at']);
  }
}
