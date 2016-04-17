<?php
	session_start();
		include_once("config.php");

		mysql_query("DELETE FROM shoppingcart WHERE sID='".$_GET['del']."'");
		
		header("Location: ../ShoppingCart.php");
?>