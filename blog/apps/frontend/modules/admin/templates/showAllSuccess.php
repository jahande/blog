<table class="tagsTable" border='1px'>
<th>
<td>
ID
</td>
<td>
name
</td>
<td>
Article ID
</td>

</th>
<?php $i=0;  foreach ($tags as $tag) :?>
<tr>
<td>
<?php echo $i;?>
</td>
<?php include_partial('tagRowShower', array(
  'tag'    => $tag
  //'action'  => url_for('view/addComment?id='.$postId),
  //'submit'  => "Post Comment",
  //'post' => $post
));
$i++;
?>
</tr>
<?php endforeach;?>
</table>
