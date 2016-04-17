<?php


if(!isset($_POST['signup']))
{
		$result = mysql_query("SELECT * FROM login WHERE username='".$_SESSION['user']."'");
		
		$row = mysql_fetch_array($result);
		
echo '	<h2>Update Account</h2>
		<h5 style="cursor: pointer;color: blue;width: 530px;text-align: right;"><a href="myAccount.php?cpass=change"> change password </a></h5>
		<form name="form1" method="post" action="">
			<table width="370" height="185">
			  <tr>
				<td width="173" height="20"> Last Name: </td>
				<td width="173" height="20"> First Name; </td>
				<td width="62" height="20"> M.I. </td>
			  </tr>
			  <tr>
				<td height="24"><input type="text" name="Lname" id="Lname" size="29"  value="'.$row["LastName"].'" required/></td>
				<td><input type="text" name="Fname" id="Fname"size="29" value="'.$row["FirstName"].'"  required/></td>
				<td><input type="text" name="Mi" id="Mi" size="5" maxlength="2" value="'.$row["Mi"].'"  required/></td>
			  </tr>
			  <tr>
				<td height="20"> Gender: 
					<input type="radio" name="Gender" value="Male" required>Male
					<input type="radio" name="Gender" value="Female">Female
				</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td height="20"> Address : </td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td height="30" colspan="3"><input type="text" name="Address" id="Address" size="66" value="'.$row["Address"].'" required/></td>
			  </tr>
			  <tr>
				<td width="173" height="21"> Contact number: </td>
				<td width="173">Email address: </td>
				<td width="62">&nbsp;</td>
			  </tr>
			  <tr>
				<td width="173" height="24"><input type="text" name="Cnum" id="Cnum" size="29" value="'.$row["Contact"].'"/></td>
				<td colspan="2"><input type="text" name="email" id="email" size="40" value="'.$row["Email"].'" required/></td>
			  </tr>
			  
			  <tr>
				<td height="26"><input name="signup" type="submit" value="Update" /></td>
				<td> </td>
				<td>&nbsp;</td>
			  </tr>
			</table>
		</form>';
}
else
{
	

	$result = mysql_query("UPDATE login SET LastName='".$_POST['Lname']."', FirstName='".$_POST['Fname']."', Mi='".$_POST['Mi']."', Gender='".$_POST['Gender']."',
				Address='".$_POST['Address']."', Contact='".$_POST['Cnum']."', Email='".$_POST['email']."' WHERE username='".$_SESSION['user']."'")
				or die ('error');
		
	echo 'Successfully Update';	
}


?>