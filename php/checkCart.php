<?php
session_start();
	include_once("config.php");
	
	$user = $_SESSION['user'];
	$imgpath = $_SESSION['ImgPath'];
	$mod = $_SESSION['mod'];
	$price = $_SESSION['price'];
	$qty = $_POST['qty'];
	
	
	$result = mysql_query("SELECT * FROM login WHERE username='".$user."'");
	$row = mysql_fetch_array($result);
	
		
	$result2 = mysql_query("SELECT * FROM mobiledesc WHERE Model='".$mod."'");
	$row2 = mysql_fetch_array($result2);
	
		$mobCode = $row2['MobCode'];

	mysql_query("INSERT INTO shoppingcart(UserName,MobCode,Qty,Date)
				VALUES('".$user."','".$mobCode."','".$qty."','".date ("y/m/d")."')")
				or die("Query  : "  . mysql_error());
	header('Location: ../ShoppingCart.php');			
?>