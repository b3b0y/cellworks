<?php
	$usersCount = count($_POST['users']);
		for($i=0; $i<$usersCount; $i++) 
		{
				mysql_query("UPDATE login SET LastName='".$_POST['Lname'][$i]."', FirstName='".$_POST['Fname'][$i]."', Mi='".$_POST['Mi'][$i]."', Gender='".$_POST['Gender'][$i]."',
						Address='".$_POST['Address'][$i]."', Contact='".$_POST['Cnum'][$i]."', Email='".$_POST['email'][$i]."' WHERE username='".$_POST['username'][$i]."'")
						or die ('error');
						
				header("Location: Admin.php?Account=Acct");
	
		}
?>