<div class='postshowers' >
<div class='postshowers_title'><?php echo $post->title;?></div>
<div class='postshowers_created_at'>posted in: <?php echo $post->created_at;?></div>
<div class='postshowers_content'><?php echo $post->content;?></div>
<!-- <div class='postshowers_like'><?php echo $post->like_;?> person like this and <?php echo $post->dislike;?> person dislike</div> -->

<table>
<tr>
<td>
<div id="<?php echo "postLike$post->id" ?>" class="like"><?php echo $post->like_?>+</div>
</td>
<td>
<div id="<?php echo "postDislike$post->id" ?>" class="dislike"><?php echo $post->dislike?>-</div>
</td>
</tr>
</table>

<div class='postshowers_count'><?php
echo isset($numOfComments)?"number of comments: ".$numOfComments:"no comment";
?></div>
<div onclick="<?php echo "likePost($post->id);";?>">
like
<?php //echo link_to1('like',array('module'=>'view','action'=>'liker','id'=>$post->id),'');?>
 </div><div onclick="<?php echo "dislikePost($post->id);";?>">
dislike<?php //echo link_to1('dislike',array('module'=>'view','action'=>'disliker','id'=>$post->id),'');?>
</div>
<?php if($showComment):?>
<div class='postshowers_commentLink'><?php echo link_to("comment","view/showComments?id=".$post->id);?>
</div>
<?php endif;?>
</div>
