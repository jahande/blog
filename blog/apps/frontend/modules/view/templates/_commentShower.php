<div class='commentshowers' style=''>

<div class='commentshowers_author'><?php echo $comment->author?></div>
<div class='commentshowers_created_at'>posted in:<?php echo $comment->created_at?></div>
<div class='commentshowers_content'><?php echo $comment->content?></div>
<!-- <div class='commentshowers_like'><?php echo $comment->like_;?> person like this and <?php echo $comment->dislike;?> person dislike</div>  -->
<table>
<tr>
<td>
<div id="<?php echo "commentLike$comment->id" ?>" class="like"><?php echo $comment->like_?>+</div>
</td>
<td>
<div id="<?php echo "commentDislike$comment->id" ?>" class="dislike"><?php echo $comment->dislike?>-</div>
</td>
</tr>
</table>

<div onclick="<?php echo "likeComment($comment->id);";?>">
like
<?php //echo link_to1('like',array('module'=>'view','action'=>'liker','id'=>$post->id),'');?>
 </div><div onclick="<?php echo "dislikeComment($comment->id);";?>">
dislike<?php //echo link_to1('dislike',array('module'=>'view','action'=>'disliker','id'=>$post->id),'');?>
</div>
<?php //echo link_to1('like',array('module'=>'view','action'=>'commentLiker','id'=>$comment->id),'');?>
 
<?php //echo link_to1('dislike',array('module'=>'view','action'=>'commentDisliker','id'=>$comment->id),'');?>

</div>