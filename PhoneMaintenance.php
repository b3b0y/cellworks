<?php
session_start();
	include_once("php/config.php");
	
	if(!isset($_SESSION['login'])) 
	{
        header("Location: index.php");
	} 
	
	$_SESSION['add'] = "ADD";
	
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
		$logio = '<li> <a href="php/Logout.php"> Logout </a> </li> <li> | </li>';
		$setting = ' <li> <a class="sett" > Dashboard </a> </li>';
		$view = '<a href="ViewAll.php"> <input type="button" value="VIEW ALL"> </a>';
		$cancel = '<a href="PhoneMaintenance.php"> <input type="button" value="CANCEL"></a>';
		$head = '<li> | </li>
		<li><a href="myAccount.php"> My Account </a></li> ';
	}
	else if($_SESSION['login'] == "CASHIER")
	{
		$logio = ' <li> <a href="php/Logout.php"> Logout </a> </li> <li> | </li>';
		$setting = ' <li> <a> POS </a> </li>';
		$head = '<li> | </li>
		<li><a href="myAccount.php"> My Account </a></li> ';
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
<title>Phone Maintenance</title>

<link rel="stylesheet" href="CSS/Cellworks.css" type="text/css" />
<link rel="stylesheet" href="CSS/CellworksNav.css" type="text/css" />
<script src="Javascript/jqueryinst.js" type="text/javascript"></script>
<script type="text/javascript" src="Javascript/jQuery v1.7.js"></script>
<script type="text/javascript" src="Javascript/Cellworks.js"></script>
<script src="Javascript/basic.js" type="text/javascript"></script>
</head>

<body>
<div id="page">

	<?php include("php/Header.php") ?> <!-- HD -->     
    <div id="bd" class="clearfix"> 
		<div id="top-slot">
			<div class="row">
				<div class="twelve columns">
					<div class="html-widget top clearfix">
						<p>&nbsp;</p>
					</div>            
				</div>
			</div>
			<div class="row">
				<div class="twelve columns">
					
				</div>
			</div>
		</div><!-- top Slot -->
		<div id="top-slot">
			<div class="row">
				<div class="twelve columns">
					<div class="html-widget top clearfix">
						<div id="facets">
							<div id="" class="clearfix facet">
									<h6> Phone Maintenance </h6>
								<div class="top">
									<ul >
										<li>
											<a href="PhoneMaintenance.php?Addphone=Addp"> Add Phones </a>
										</li>
										<li>
											<a href="#">Add Slides</a>
										</li>
										<li>
											<a href="PhoneMaintenance.php?Brand=Brand"> Add Brands </a>
										</li>
										<li>
											<a href="PhoneMaintenance.php?Item=Item"> Item Purchased </a>
										</li>
										<li>
											<a href="PhoneMaintenance.php?ViewAll=ViewAll"> View All Phones </a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>            
				</div>
			</div>
			<div class="row">
				<div class="twelve columns">
					
				</div>
			</div>
		</div><!-- top Slot -->
		<div id="left-slot" class="span-5">
			
		</div>
		<div id="content-slot" class="span-19 last">
			<div class="clearfix">
				<div class="row">
					<div class="twelve columns">
						<p> &nbsp </p>
					</div>
				</div>
				<div class="row">
					<div class="twelve columns">
						<?php
							if(isset($_GET['IMEI']) == "Imei")
							{
								if(!$_POST['signup'])
								{
									$result = mysql_query("SELECT * FROM mobiledesc");
									
									
									echo '<h2>Add Phone IMEI</h2>
										<p style="float:right"> <a href="PhoneMaintenance.php?inven=inven"> Back </a> </p>
									<form name="form1" method="post" action="'.$_SERVERP["../PHP_SELF"].'">
										<table width="370" height="228">
										  <tr>
											<td height="21" colspan="2"> Mobile Model</td>
											<td width="23" >&nbsp;</td>
										  </tr>
										  <tr>
											<td height="40" colspan="2" >
												<select name="mobcode" required> 
													<option value="" selected> Select Mobile </option> ';		
									while($row = mysql_fetch_array($result))
									{
										echo 	"	<option value='".$row['MobCode']."'>" .$row['Model']. "</option>";
									}			
									echo	'	</select>
											</td>
											<td width="23" >&nbsp;</td>
										  </tr>
										  <tr>
											<td height="21" colspan="2"> Phone IMEI Code</td>
											<td width="23" >&nbsp;</td>
										  </tr>
										  <tr>
											<td height="24" colspan="2"><input type="text" name="imei" id="pass2" size="55" placeholder="IMEI Code" required/></td>
											<td width="23" >&nbsp;</td>
										  </tr>
										  <tr>
											<td height="17" colspan="3"> <font size="2">(Please ensure that the IMEI code is Correct) </font></td>
										  </tr>
										  <tr>
											<td height="21" colspan="2">IMEI Confirmation Code</td>
											<td width="23" >&nbsp;</td>
										  </tr>
										  <tr>
											<td height="24" colspan="2"><input type="text" name="cimei" id="pass2" size="55" placeholder="IMEI Confirmation" required/></td>
											<td width="23" >&nbsp;</td>
										  </tr>
										  <tr>
											<td width="152" height="26"><input name="signup" type="submit" value="ADD" /></td>
											<td width="179">&nbsp;</td>
											<td>&nbsp;</td>
										  </tr>
										</table>
									</form>';
								}
								else
								{
									$mobcode = $_POST['mobcode'];
									$imei = $_POST['imei'];
									$cimei = $_POST['cimei'];
									
										
									if($_POST['imei'] == $_POST['cimei'])
									{
										mysql_query("INSERT INTO phon_imei(MobCode,IMEI) VALUES('".$mobcode."','".$imei."')");
										echo "Successfully added";
									}
									else
									{
									
										echo "IMEI code doesn't match confirmation";
									}
									
								}
							}
							else if(isset($_GET['Item']) == "Item")
							{
								include_once('itemPurchased.php');
							}
							else if(isset($_GET['inven']) == "inven")
							{
								echo '<p> <a href="PhoneMaintenance.php?IMEI=Imei"> <img src="Images/logo/add.png" /> Add Phones IMEI </a> </p>';
								include_once('inventory.php');
							}
							else if(isset($_GET['Brand'])== "Brand")
							{
								if(!isset($_POST['signup']))
								{
									$result = mysql_query("SELECT * FROM brands");
									
									
									echo '<h2>Add Brands</h2>
									<form name="form1" method="post" action="">
										<table width="370" height="228">
										 <tr>
											<td height="40" colspan="2" >
												<select name="mobcode" > 
													<option value="" selected> BRAND STORED </option> ';		
									while($row = mysql_fetch_array($result))
									{
										echo 	"	<option value='".$row['Brands']."'>" .$row['Brands']. "</option>";
									}			
									echo	'	</select>
											</td>
											<td width="23" >&nbsp;</td>
										</tr>
										  <tr>
											<td height="21" colspan="2"> Enter Brands </td>
											<td width="23" >&nbsp;</td>
										  </tr>
										  <tr>
											<td height="24" colspan="2"><input type="text" name="Brand" id="pass2" size="55" placeholder="Enter Brand" required/></td>
											<td width="23" >&nbsp;</td>
										  </tr>
										  <tr>
											<td width="152" height="26"><input name="signup" type="submit" value="ADD" /></td>
										  </tr>
										</table>
									</form>';
								}
								else
								{
									$Brand = $_POST['Brand'];
									$result = mysql_query("SELECT * FROM brands WHERE Brands='".$Brand."'");
									if(mysql_num_rows($result) > 0)
									{
										echo '<p>&nbsp</p>';
										echo $Brand." is Already in Database <br><br>";
										echo '<a href="PhoneMaintenance.php?Brand=Brand"> Back </a>';
									}
									else
									{
										mysql_query("INSERT INTO brands(Brands) VALUES('".$Brand."')");
										echo "Successfully added";
									}
								}
								
							}
							else if(isset($_GET['Addphone']) == "Addp")
							{
							
								include_once('PhoneAdd.php');
							}
							else if(isset($_GET['ViewAll']) == "ViewAll")
							{
							
								include_once('ViewAll.php');
							}
						?>
					</div> 
				</div>
			</div>
		</div>
	</div> <!-- bd -->
	<?php include("php/Footer.php") ?> 

</div>
</body>
</html>