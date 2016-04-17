<?php

echo '<h2>Add Brands</h2>
	<form name="form1" method="post" action="'.$_SERVERP["../PHP_SELF"].'">
		<table width="370" height="228">
		 <tr>
			<td height="40" colspan="2" >
				<select name="mobcode" > 
					<option value="" selected> BRAND STORED </option> ';		
	while($row = mysql_fetch_array($result))
	{
		echo 	"	<option value='".$row['Brands']."'>" .$row['Brands']. "</option>";
	}			
	echo	'	</select>
			</td>
			<td width="23" >&nbsp;</td>
		</tr>
		  <tr>
			<td height="21" colspan="2"> Enter Brands </td>
			<td width="23" >&nbsp;</td>
		  </tr>
		  <tr>
			<td height="24" colspan="2"><input type="text" name="Brand" id="pass2" size="55" placeholder="Enter Brand" required/></td>
			<td width="23" >&nbsp;</td>
		  </tr>
		  <tr>
			<td width="152" height="26"><input name="signup" type="submit" value="ADD" /></td>
		  </tr>
		</table>
	</form>';

?>