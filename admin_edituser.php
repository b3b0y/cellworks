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
	
	if(isset($_POST["submit"]) && $_POST["submit"]!="") {
		$usersCount = count($_SESSION['user']);
		for($i=0; $i<$usersCount; $i++) 
		{
				mysql_query("UPDATE login SET LastName='".$_POST['Lname'][$i]."', FirstName='".$_POST['Fname'][$i]."', Mi='".$_POST['Mi'][$i]."', Gender='".$_POST['Gender'][$i]."',
						Address='".$_POST['Address'][$i]."', Contact='".$_POST['Cnum'][$i]."', Email='".$_POST['email'][$i]."' WHERE username='".$_SESSION['user'][$i]."'")
						or die ('error');
						
				header("Location: Admin.php?Account=Acct");
	
		}
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
	
	<?php include_once("php/Header.php") ?>
	<div id="bd" class="clearfix">
		<div style="width:500px;">
			<h2>Update Account</h2>
		</div> 
		<div class="row">
        	<div class="twelve columns" style="width:500px;">  
				<?php
					$rowCount = count($_POST["users"]);
					$_SESSION['user'] = $_POST["users"];
					
					for($i=0; $i<$rowCount; $i++) 
					{
						$result = mysql_query("SELECT * FROM login WHERE username='".$_POST['users'][$i]."'");
					
						$row[$i] = mysql_fetch_array($result);
						$counter++;
						
					?>
						<form name="frmUser" method="post" action="<?php echo $_SERVERP["../PHP_SELF"] ?> ">
							
							<table width="370" height="185" style="border-top:2px #999999 solid; background-color: #f8f8f8;">
							  <tr>
								<td width="173" height="20"> Last Name: </td>
								<td width="173" height="20"> First Name; </td>
								<td width="62" height="20"> M.I. </td>
							  </tr>
							  <tr>
								<td height="24"><input type="text" name="Lname[]" id="Lname" size="29"  value="<?php echo $row[$i]["LastName"] ?>" required/></td>
								<td><input type="text" name="Fname[]" id="Fname"size="29" value="<?php echo $row[$i]["FirstName"] ?>"  required/></td>
								<td><input type="text" name="Mi[]" id="Mi" size="5" maxlength="2" value="<?php echo $row[$i]["Mi"] ?>"  required/></td>
							  </tr>
							  <tr>
								<td height="20"> Gender: 
									<input type="radio" name="Gender[<?php echo $i ?>]" value="Male" <?php echo ($row[$i]["Gender"]== "Male") ?  "checked='checked'" : ""  ?> required>Male
									<input type="radio" name="Gender[<?php echo $i ?>]" value="Female" <?php echo ($row[$i]["Gender"]== "Female") ?  "checked='checked'" : "" ?> >Female
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
								<td height="30" colspan="3"><input type="text" name="Address[]" id="Address" size="66" value="<?php echo $row[$i]["Address"] ?>" required/></td>
							  </tr>
							  <tr>
								<td width="173" height="21"> Contact number: </td>
								<td width="173">Email address: </td>
								<td width="62">&nbsp;</td>
							  </tr>
							  <tr>
								<td width="173" height="24"><input type="text" name="Cnum[]" id="Cnum" size="29" value="<?php echo $row[$i]["Contact"] ?> "/></td>
								<td colspan="2"><input type="text" name="email[]" id="email" size="40" value="<?php echo $row[$i]["Email"] ?>" required/></td>
							  </tr>
							  <tr>
								<td height="21" colspan="2"> User Name: </td>
								<td width="62" >&nbsp;</td>
							  </tr>
							  <tr>
								<td colspan="2"><input type="text" name="uname2[]" id="uname2" size="55" value="<?php echo $row[$i]["username"] ?>" placeholder="User Name" required/></td>
								<td width="62" >&nbsp;</td>
							  </tr>
							  <tr>
								<td height="21" colspan="2"> Password: </td>
								<td width="62" >&nbsp;</td>
							  </tr>
							  <tr>
								<td colspan="2"><input type="password" name="pass2[]" id="pass2" size="55" value="<?php echo $row[$i]["password"] ?>" placeholder="Password" required/></td>
								<td width="62" >&nbsp;</td>
							  </tr>
							  <tr>
								<td colspan="3"> <font size="2">(Please ensure that your Password has a minimum of 6 characters) </font></td>
							  </tr>
							  <tr>
								<td height="21" colspan="2">Password confirmation </td>
								<td>&nbsp;</td>
							  </tr>
							  <tr>
								<td colspan="2"><input type="password" name="cpass[]" id="cpass" size="55" value="<?php echo $row[$i]["password"] ?>" placeholder="Password confirmation" required/></td>
								<td>&nbsp;</td>
							  </tr>
							  <tr>
					<?php
					}
					?>
								<td height="26"><input name="submit" type="submit" value="Update" /></td>
								<td> <a href="Admin.php?Account=Acct"> <input type="button" value="Back">  </a></td>
								<td>&nbsp;</td>
							  </tr>
							</table>
						</form>
						
						
			
			</div>
		</div>
	</div> <!--bd-->
	<?php include("php/Footer.php") ?>
	
</div> <!-- Page -->
</body>
</html>			