<?php if(isset($post) && $post):?>

<?php include_partial('postShower',array('showComment'=>false, 'post'=>$post));?>
<div id="postComments">
<?php foreach ($comments as $comment): ?>
	
	<hr />
	<div>
	<?php include_partial('commentShower',array('comment'=>$comment) );?>
	</div>
<?php endforeach;?>
</div>
<?php else :?>
<h2>You try wrong URL</h2>
<?php endif;?>
<div class="writeComment"><h3>write a comment</h3>
<?php 
$form = new CommentForm();
//echo $form->__toString();
//echo $form->setup();
include_partial('newComment', array(
  'form'    => $form,
  'action'  => url_for('view/addComment?id='.$postId),
  'submit'  => "Post Comment",
  'post' => $post
));
?>
</div>



<?php slot('leftsidebar') ?>
<!-- custom sidebar code for the current template-->
<?php if($hasAdminCredential):?>
<?php echo link_to('Add article','admin/new');?>
<br />
<?php echo link_to('Add random article','admin/addRandomArticle');?>
<br />
<?php echo link_to('add tag','admin/newTag');?>
<br />
<?php echo link_to('see tags','admin/showAll');?>
<br />
<?php echo link_to('log out','login/logout');?>
<?php else:?>
<h1>Author details</h1>
<p>name: <?php echo $user_->user_name ;?></p>
<?php echo link_to('log in','login/index');?>
<?php endif;?>
<?php end_slot() ?>
<!--  -->