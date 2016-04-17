<?php
session_start();	
	include_once("php/config.php");
	
	if(!isset($_SESSION['login'])) 
	{
            header("Location: index.php");
	} 
	
	if($_SESSION['login'] == "USER")
	{
		$logio = '<li> <a href="php/Logout.php"> Logout </a> </li>';
		$head = '<li> | </li>
		<li><a href="myAccount.php"> My Account </a></li> 
		<li> | </li>
		<li><a class="shopping-cart" href="ShoppingCart.php"> Shopping Cart </a></li>';
	}
	else if($_SESSION['login'] == "ADMIN")
	{
		$logio = ' <li> <a href="php/Logout.php"> Logout </a> </li> <li> | </li>';
		$setting = ' <li> <a class="sett" > Dashboard </a> </li>';
		$head = '<li> | </li>
		<li><a href="myAccount.php"> My Account </a></li> 
		<li> | </li>
		<li><a class="shopping-cart" href="ShoppingCart.php"> Shopping Cart </a></li>';
	}
	else
	{
		$logio = '<a class="button"> Login </a>';
	}

?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cellworks</title>



<link rel="stylesheet" href="CSS/Cellworks.css" type="text/css" />
<link rel="stylesheet" href="CSS/CellworksNav.css" type="text/css" />
<script src="Javascript/jqueryinst.js" type="text/javascript"></script>
<script type="text/javascript" src="Javascript/jQuery v1.7.js"></script>
<script type="text/javascript" src="Javascript/Cellworks.js"></script>
<script src="Javascript/basic.js" type="text/javascript"></script>
	
</head>

<body>
<div id="page">
	<?php include("php/Header.php") ?>
	<div id="bd" class="clearfix">
		<div class="row">
        	<div class="twelve columns">  
				<?php
					if(!$_POST['signup'])
					{	

						echo '<h2>Change Password</h2>
								<h2>'.$_GET['userid'].'</h2>
								<h5 style="cursor: pointer;width: 370px;text-align: right;"><a href="admin.php"> Back </a> </h5>
								<form name="form1" method="post" action="'.$_SERVER["../PHP_SELF"].'">
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
								$result = mysql_query("UPDATE login SET password='".$_POST['pass']."' WHERE username='".$_GET['userid']."'")
										or die ('error');
								
								header("Location: Admin.php");		
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
			</div>
		</div>
	</div> <!--bd-->
	<?php include("php/Footer.php") ?>
	
</div> <!-- Page -->
</body>
</html>