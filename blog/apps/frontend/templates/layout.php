<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>
<link rel="shortcut icon" href="/favicon.ico" />
<?php include_stylesheets() ?>
<?php include_javascripts() ?>
</head>
<body>
<div id="mainheader">In The Name Of Allah</div>
<div id="secondHeader" onclick="likePost()">welcome to blog_name</div>
<div class="layoutTagsShower"><?php include_component('view', 'tagsShower', array('foo' => 'bar')) ;?>
</div>
<div class="layoutContent"><?php echo $sf_content ?></div>
<div class="layoutArchive"><?php include_component('view', 'archiveShower', array('foo' => 'bar')) ; ?>
</div>
<?php if (has_slot('sidebar')): ?>
<?php include_slot('sidebar') ?>
<?php else: ?>
<?php endif;?>

<div id="leftsidebar">
<?php if (has_slot('leftsidebar')): ?>
<?php include_slot('leftsidebar') ?>
<?php else: ?>
<!-- default sidebar code -->
<h1>Contextual zone</h1>
<p>This zone contains links and information
relative to the main content of the page.</p>
<!--  <?php //echo link_to('add tag','/admin/newTag')?> -->
<?php echo link_to('Home page','/')?>
<?php endif; ?>
</div>
</body>
</html>