<?php if( isset($posts[0])):?>
<div>
<h1>viewing archived posts</h1>
</div>
<?php
//echo sizeof($posts);
/////include_component('view', 'tagsShower', array('foo' => 'bar'));
foreach ($posts as $post) {
	?>
<hr />
	<?php
	include_partial('postShower',array('showComment'=>true, 'post'=>$post,'numOfComments'=>$count_array[  $post->id ] ) );
}?>
<?php else:?>

<div>
<h1>There is no post in this month</h1>
</div>
<?php endif;?>


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