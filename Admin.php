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
		<li><a href="myAccount.php"> My Account </a></li> ';
	}
	else if($_SESSION['login'] == "CASHIER")
	{
		$logio = ' <li> <a href="php/Logout.php"> Logout </a> </li> <li> | </li>';
		$setting = ' <li> <a> POS </a> </li>';
		$head = '<li> | </li>
		<li><a href="myAccount.php"> My Account </a></li> 
		<li> | </li>
		<li><a class="shopping-cart" href="ShoppingCart.php"> Shopping Cart </a></li>';
	}
	else
	{
		$logio = '<a class="button"> Login </a>';
	}
	
	$id = isset($_GET['username']);

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
<script language="javascript" src="Javascript/users.js" type="text/javascript"></script>
	
	
</head>

<body>
<div id="page">
	
	<?php include("php/Header.php") ?>
    <div id="bd" class="clearfix"> 
		<div id="top-slot">
			<div class="row">
				<div class="twelve columns">
					<div class="html-widget top clearfix">
						<p>&nbsp;</p>
					</div>            
				</div>
			</div>
		</div>
		<div id="top-slot">
			<div class="row">
				<div class="twelve columns">
					<div class="html-widget top clearfix">
						<div id="facets">
							<div id="" class="clearfix facet">
								<h6> Admin Maintenance </h6>
								<ul >
									<li class="menu-level-0">
										<a class="" href="Admin.php?Account=Acct">Account</a>
									</li>
									<li>
										<a  href="Admin.php?AddAcct=Add">Add Account </a>
									</li>
									<li>
										<a href="#">[Title here] </a>
									</li>
									<li>
										<a href="#">[Title here] </a>
									</li>
									<li>
										<a href="#">[Title here] </a>
									</li>         
								</ul>
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
		<div id="content-slot" class="span-19 last">
			<div class="clearfix">
				<div class="row">
					<div class="twelve columns">
						<p> &nbsp </p>
					</div>
				</div>
				<div class="row">
					<div class="twelve columns">
						<div class="clearfix">
						
							<?php
							
							if(isset($_GET['Account']) == "Acct")
							{
								echo '
								<div align="center" id="feature_groups">
									<h2> Admin Center</h2>
									<style type="text/css">
										
										
										
										#th
										{
											text-align:center;
											
											background: #fcac12; 
											background: linear-gradient(top, #FFFFFF 0%, #FF9933 70%);  
											background: -moz-linear-gradient(top, #FFFFFF 0%, #FF9933 70%); 
											background: -webkit-linear-gradient(top, #FFFFFF 0%,#FF9933 70%);
										}
										
										#td
										{
											border-left:10;
											border-left-width:thin;
											border-color:#CCC;
											border-style:solid;
										}
										
									</style>';
							?>
							<form  name="frmUser" method="post" action="">
								<?php
								
									$result = mysql_query("SELECT * FROM login WHERE status='live'");
									
									
									if(mysql_num_rows($result) > 0)
									{
										echo "<table align='center' cellspacing='0' cellpadding='5' >"; 
										echo "<tr id='th'>
											 <th id='th' width='10%' ><strong>Action</strong></th>
											 <th id='th' width=\"20%\"><strong> Name</strong></th>
											 <th id='th' width=\"20%\"><strong> Address</strong></th>
											 <th id='th' width=\"10%\"><strong> Contact</strong></th>
											 <th id='th' width=\"15%\"><strong> Email Address</strong></th>
											 <th id='th' width=\"10%\"><strong> Username</strong></th>
											
											 <th width=\"10%\" style='text-align:center;'><strong> Login</strong></th>
											 <th width=\"5%\" style='text-align:center;'><strong> Level</strong></th>
											 </tr>";  
										?>
				
										<input type="button" name="delete" id="btnSubmit"  value="Delete"  onClick="setDeleteAction();" >
										<input type="button" name="update" id="btnSubmit"  value="Update" onClick="setUpdateAction();"  >
										
								<?php		
										while($array = mysql_fetch_array($result))
										{
								?>			<tr height="35" >
											<td  style='text-align:center;'> <input type="checkbox" name="users[]" value="<?php echo $array['username']; ?>" id="chkAgree"> </td>
										<!--	<td id='td'> <a href='admin_edituser.php?userid=<?php echo $array['username']; ?>'> <img src='Images/logo/edit.png' alt='Edit Users Details' /></a></td>
											<td id='td'> <a href='admin_editpass.php?userid=<?php echo $array['username']; ?>'><img src='Images/logo/password.png' alt='Change Users Password' /></a></td>-->
											 
											<td id='td' style="width:500px"> <?php echo $array['FirstName']; ?>&nbsp <?php echo $array['Mi']; ?>&nbsp <?php echo $array['LastName']; ?></td>
											<td id='td' style="width:auto"> <?php echo $array['Address']; ?></td>
											<td id='td'> <?php echo $array['Contact']; ?></td>
											<td id='td'> <?php echo $array['Email']; ?></td>
											<td id='td'> <?php echo $array['username'] ?></td>
											
											<td id='td' style='text-align:center;'><?php echo $array['last_loggedin']; ?></td>
											<td id='td' style='text-align:center;'><?php echo $array['user_level']; ?></td>
											 
											</tr>		
									</form>											
								<?php
										}
										echo "</table>";	
									}
							echo '</div>';
							}
							else if(isset($_GET['AddAcct']) == "Add")
							{
								echo'
									<div class="row">
										<div class="twelve columns">
											<div class="act">
												<h2>Create Account</h2>				
												<form name="form1" method="post" action="php/checkSign.php">
													<table width="370" height="492">
													  <tr>
														<td width="173" height="20"> Last Name: </td>
														<td width="173" height="20"> First Name; </td>
														<td width="62" height="20"> M.I. </td>
													  </tr>
													  <tr>
														<td><input type="text" name="Lname" id="Lname" size="29"  placeholder="Last Name" required/></td>
														<td><input type="text" name="Fname" id="Fname"size="29" placeholder="First Name" required/></td>
														<td><input type="text" name="Mi" id="Mi" size="5" maxlength="2" placeholder="M.I." required/></td>
													  </tr>
													  <tr>
														<td height="20"> Address : </td>
														<td>&nbsp;</td>
														<td>&nbsp;</td>
													  </tr>
													  <tr>
														<td height="30" colspan="3"><input type="text" name="Address" id="Address" size="66" placeholder="Address" required/></td>
													  </tr>
													  <tr>
														<td width="173"> Contact number: </td>
														<td width="173">Email address: </td>
														<td width="62">&nbsp;</td>
													  </tr>
													  <tr>
														<td width="173"><input type="text" name="Cnum" id="Cnum" size="29" placeholder="Contact Number"/></td>
														<td colspan="2"><input type="text" name="email" id="email" size="40" placeholder="Email Address" required/></td>
													  </tr>
													  <tr>
														<td height="21" colspan="2"> User Name: </td>
														<td width="62" >&nbsp;</td>
													  </tr>
													  <tr>
														<td colspan="2"><input type="text" name="uname2" id="uname2" size="55" placeholder="User Name" required/></td>
														<td width="62" >&nbsp;</td>
													  </tr>
													  <tr>
														<td height="21" colspan="2"> Password: </td>
														<td width="62" >&nbsp;</td>
													  </tr>
													  <tr>
														<td colspan="2"><input type="password" name="pass2" id="pass2" size="55" placeholder="Password" required/></td>
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
														<td colspan="2"><input type="password" name="cpass" id="cpass" size="55" placeholder="Password confirmation" required/></td>
														<td>&nbsp;</td>
													  </tr>
													  <tr>
														<tr>
															<td>
															</td>
														</tr>
														<td height="21">User Level</td>
													  </tr>
													  <tr>
														<td colspan="2"> 
															<select name="uLevel" required>
																<option value=""> SELECT USER LEVEL </option>
																<option value="5"> Admin </option>
																<option value="3"> Cashier </option>
																<option value="1"> Member </option>
														</td>				   
														<td width="62" >&nbsp;</td>
													  </tr>
													  <tr>
														<td height="64">&nbsp;</td>
														<td> <input name="signup" type="submit" value="ADD" /></td>
														<td>&nbsp;</td>
													  </tr>
													</table>
												</form>
											</div>
										</div> 
									</div> ';
							}
							?>
							
						</div>  
					</div>
				</div>  
			</div>
		</div>  
	</div> <!--bd-->
    <?php include("php/Footer.php") ?>

</div> <!-- Page -->
</body>
</html>