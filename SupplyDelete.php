<?php
	include_once("php/config.php");
	
		$rowCount = count($_POST["users"]);
		
		for($i=0; $i<$rowCount; $i++)
		{
			mysql_query("DELETE FROM supplier WHERE  supID='".$_POST["users"][$i]."'");
		}

	header("Location: SupplyMaintenance.php?Account=Acct");
?>