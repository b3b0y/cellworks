<?php
	include_once("php/config.php");
	
		$rowCount = count($_POST["users"]);
		
		for($i=0; $i<$rowCount; $i++)
		{
			mysql_query("DELETE FROM login WHERE username='".$_POST["users"][$i]."'");
		}

	header("Location: Admin.php?Account=Acct");
?>