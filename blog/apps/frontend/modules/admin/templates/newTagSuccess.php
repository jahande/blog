<form action='<?php echo url_for('admin/addTag')?>' method=post>

<div align="center"><select name='act' >
					<option value="1">حذف</option>
					<option value="2">اضافه</option>
					<option value="3">تغییر</option>
				</select></div>
<table border='0' cellspacing='0' cellpadding='0' align=center>
	
		<tr>
			
			<td bgcolor='#f1f1f1' align='center'>
				 <input type='text'
				class='bginput' name='tagName'></td>
				<td bgcolor='#f1f1f1'><div style="text-align:right;">: نام تگ </div></td>
		</tr>

		<tr>
			
			<td bgcolor='#ffffff' align='center'><input type='text'
				class='bginput' name='article_id'></td>
				<td bgcolor='#ffffff'><div style="text-align:right;"> شماره ی پست مربوط: </div></td>
		</tr>
		<tr>
			<td bgcolor='#f1f1f1' colspan='2' align='center'> <input
				type='submit' value='انجام'>  </td>
		</tr>
		

		<!-- <tr><td bgcolor='#ffffff'><font face='verdana, arial, helvetica' size='2'> <a href='signup.php'>New Member Sign UP</a></font></td><td bgcolor='#ffffff' align='center'><fontface='verdana, arial, helvetica' size='2'> Forgot Password ?</font></td></tr> -->

		

</table>
</form>