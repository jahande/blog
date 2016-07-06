<div class='error_login'>your username or password is wrong</div>
<?php echo 	link_to('Try again','login/index');?>

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