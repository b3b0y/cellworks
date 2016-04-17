<?php
	include_once("config.php");
	session_start();
	
	$result = mysql_query("SELECT m.*,i.* FROM mobiledesc as m, inventory as i WHERE (i.MobCode = m.MobCode) AND m.Model='".$_GET['Model']."' AND i.PQty = '0' ");
	
	if(mysql_num_rows($result) > 0)
	{
		mysql_query("DELETE FROM mobiledesc WHERE Model='".$_GET['Model']."'");
		header("Location: ../PhoneMaintenance.php?ViewAll=ViewAll");
	}
	else
	{
		 echo "<script> 
					alert('Item Cannot be DELETE'); 
					window.location.href='../PhoneMaintenance.php?ViewAll=ViewAll';
			   </script>";
	}
	
	$result = mysql_query("SELECT m.*,i.* FROM tabletdesc as m, inventory as i WHERE (i.MobCode = m.MobCode) AND m.Model='".$_GET['Model']."' AND i.PQty = '0' ");
	
	if(mysql_num_rows($result) > 0)
	{
		mysql_query("DELETE FROM tabletdesc WHERE Model='".$_GET['Model']."'");
		header("Location: ../PhoneMaintenance.php?ViewAll=ViewAll");
	}
	else
	{
		 echo "<script> 
					alert('Item Cannot be DELETE'); 
					window.location.href='../PhoneMaintenance.php?ViewAll=ViewAlll';
			   </script>";
	}
	

	
?>