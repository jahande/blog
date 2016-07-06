<div>
<?php //echo $currentMonth."#".$c." ".$foo." ".$tags[0]->name;?>
<div><h3>Posts archived</h3></div>
<?php foreach ($links as $link ) :?>
<div>
<?php echo link_to($link,"view/showArchive?year_month=$link");?>
</div>
<?php endforeach;?>
</div>
