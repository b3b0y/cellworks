<?php


if(!$_POST['signup'])
{	
	echo '<h2>Update Account</h2>
			<h5 style="cursor: pointer;width: 370px;text-align: right;"><a href="myAccount.php?update=Update"> change profile </a> </h5>
			<form name="form1" method="post" action="'.$_SERVERP["../PHP_SELF"].'">
				<table width="370" height="228">
				  <tr>
					<td height="21" colspan="2"> Current password</td>
					<td width="23" >&nbsp;</td>
				  </tr>
				  <tr>
					<td height="40" colspan="2"><input type="password" name="curpass" id="uname2" size="55" placeholder="User Name" required/></td>
					<td width="23" >&nbsp;</td>
				  </tr>
				  <tr>
					<td height="21" colspan="2"> Password: </td>
					<td width="23" >&nbsp;</td>
				  </tr>
				  <tr>
					<td height="24" colspan="2"><input type="password" name="pass" id="pass2" size="55" placeholder="Password" required/></td>
					<td width="23" >&nbsp;</td>
				  </tr>
				  <tr>
					<td height="17" colspan="3"> <font size="2">(Please ensure that your Password has a minimum of 6 characters) </font></td>
					</tr>
				  <tr>
					<td height="35" colspan="2">Password confirmation </td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td height="24" colspan="2"><input type="password" name="cpass" id="cpass" size="55" placeholder="Password confirmation" required/></td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td width="152" height="26"><input name="signup" type="submit" value="Update" /></td>
					<td width="179">&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				</table>
			</form>';
}
else
{
	$sql = "SELECT * FROM Login WHERE (password='".$_POST['curpass']."')";
	$result = mysql_query($sql);
	
	if(mysql_num_rows($result) > 0)
	{
		if($_POST['pass'] == $_POST['cpass'])
		{
			$result = mysql_query("UPDATE login SET password='".$_POST['pass']."' WHERE username='".$_SESSION['user']."'")
					or die ('error');
			
			echo 'Successfully Update';	
		}
		else
		{
		
			echo "Password doesn't match confirmation";
		}
	}
	else
	{
			echo "Please check your current password.";
	}
}
			

?>