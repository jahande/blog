<!-- // /apps/frontend/layout/_form.php -->
<form name="sendComment_">
<table>
 <tr>
  <td>Author(your name!)</td>
  <td><input type="text" name="comment[author]" id="txtname" /></td>
 </tr>
 <tr>
  <td>content</td>
  <td><textarea name="comment[content]" id="txtarea" /></textarea></td>
 </tr>
 <tr>
  <td colspan="2"><input type="button" value="Submit" onclick="ajaxSendComment(<?php echo $post->id?>);" /></td>
 </tr> 
</table>
 
</form>


<br />
<hr />
<div id="message" ><h3>write comment</h3></div>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php echo $form->renderFormTag($action); ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" value="<?php echo $submit ? $submit : __("Save") ?>" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>