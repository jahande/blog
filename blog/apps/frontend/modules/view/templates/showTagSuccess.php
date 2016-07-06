<?php
//echo $x;
//echo $posts[0]->Article->content;
?>
<div>
<h1>viewing posts used tag: <?php echo $tagName;?></h1>
</div>
<?php for ($i = 0; $i < sizeof($tags); $i++):?>
<hr />
<?php include_partial('postShower',array('showComment'=>true, 'post'=>$tags[$i]->Article,'numOfComments'=>$count_array[  $tags[$i]->Article->id.'' ] ) );?>
<?php endfor;?>


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