<?php
session_start();
include_once("config.php");
$uname = $_POST['uname'];
$pass = $_POST['pass'];


function clean($value) {

    if(get_magic_quotes_gpc()) $value = stripslashes($value);
    return trim(mysql_real_escape_string($value));
}



$sql = "SELECT * FROM Login WHERE (username='$uname' || Email='$uname')";
$qry = mysql_query($sql) or die("Query IS wrong : " . mysql_error());
$num = mysql_num_rows($qry);
	
$row = mysql_fetch_array($qry);
if ($num==0 || $pass!=$row['password']) //check if the pass is in the database
{
	//failed to login
	$_SESSION['Fail'] = 1;
	
	header("Location: ../index.php");
} 
else 
{
	//successfuly login
	mysql_query("UPDATE login SET last_loggedin = '".date ("d/m/y G:i:s")."' WHERE username = '".$uname."'");
	if($row['user_level'] == 5) //check if User level is 5
	{
		$_SESSION['login'] = "ADMIN";
		$_SESSION['user']= $uname;
		mysql_query("DELETE FROM  shoppingcart WHERE UserName='".$uname."'");

		$result = mysql_query("SELECT * FROM itempurchased WHERE DatePurch <= DATE_SUB(CURDATE(), INTERVAL 7 DAY);");
		
		if(mysql_num_rows($result) > 0 )
		{
			while($row = mysql_fetch_array($result))
			{
				mysql_query("UPDATE phon_imei SET status='Available' WHERE IMEI='".$row['IMEI']."' ");
				
			}
		
			mysql_query("DELETE FROM itempurchased WHERE DatePurch <= DATE_SUB(CURDATE(), INTERVAL 7 DAY);");
		}
		
		unset($_SESSION['Fail']);
		
		header("Location: ../index.php");
		
	}
	else if($row['user_level'] == 3)
	{
		$_SESSION['login'] = "CASHIER";
		$_SESSION['user']= $uname;
		mysql_query("DELETE FROM  shoppingcart WHERE UserName='".$uname."'");

		$result = mysql_query("SELECT * FROM itempurchased WHERE DatePurch <= DATE_SUB(CURDATE(), INTERVAL 7 DAY);");
		
		if(mysql_num_rows($result) > 0 )
		{
			while($row = mysql_fetch_array($result))
			{
				mysql_query("UPDATE phon_imei SET status='Available' WHERE IMEI='".$row['IMEI']."' ");
				
			}
		
			mysql_query("DELETE FROM itempurchased WHERE DatePurch <= DATE_SUB(CURDATE(), INTERVAL 7 DAY);");
		}
		
		unset($_SESSION['Fail']);
		header("Location: ../index.php");
	}
	else //check if User Level is 1
	{
	
		$_SESSION['login']= "USER";
		$_SESSION['user']= $uname;
		mysql_query("DELETE FROM  shoppingcart WHERE UserName='".$uname."'");

		$result = mysql_query("SELECT * FROM itempurchased WHERE DatePurch <= DATE_SUB(CURDATE(), INTERVAL 7 DAY);");
		
		if(mysql_num_rows($result) > 0)
		{
			while($row = mysql_fetch_array($result))
			{
				mysql_query("UPDATE phon_imei SET status='Available' WHERE IMEI='".$row['IMEI']."' ");
				
			}
		
			mysql_query("DELETE FROM itempurchased WHERE DatePurch <= DATE_SUB(CURDATE(), INTERVAL 7 DAY);");
		}
		unset($_SESSION['Fail']);
		header("Location: ../index.php");
	}
}

?>
