<div class='success_login'><p>Welcome <?php echo $name?></p><p>You are now entered successfuly</p></div>
<?php echo 	link_to('go to home page','view/index');?>

<?php slot('leftsidebar') ?>
<!-- custom sidebar code for the current template-->
<?php if($hasAdminCredential):?>
<?php echo link_to('Add article','admin/index');?>
<br />
<?php echo link_to('Add random article','admin/index');?>
<br />
<?php echo link_to('log out','login/logout');?>
<?php else:?>
<h1>Author details</h1>
<p>name: <?php echo $user_->user_name ;?></p>
<?php echo link_to('log in','login/index');?>
<?php endif;?>
<?php end_slot() ?>