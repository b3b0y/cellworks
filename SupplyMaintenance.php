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
	
	//$id = $_GET['username'];

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
								<h6> Supplier Maintenance </h6>
								<ul >
									<li class="menu-level-0">
										<a class="" href="SupplyMaintenance.php?AddSupp=Supp">New Supplier</a>
									</li>
									<li>
										<a class="" href="SupplyMaintenance.php?Account=Acct">Supplier List</a>
									</li>
									<li>
										<a href="SupplyMaintenance.php?SupProd=SupProd">Supplier Product </a>
									</li>
									<li>
										<a href="#">[Title here] </a>
									</li>
									<li>
										<a href="#">[Title here] </a>
									</li>         
								</ul>
						
								<?php
								
								if(isset($_GET['Account']) && $_GET['Account'] == "Acct")
								{
									echo '
									<div align="center" id="feature_groups">
										<h2> Supplier Center</h2>
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
									
										$result = mysql_query("SELECT * FROM supplier");
										
										
										if(mysql_num_rows($result) > 0)
										{
											echo "<table align='center' cellspacing='0' cellpadding='5' >"; 
											echo "<tr id='th'>
												 <th id='th' width='10%' ><strong>Action</strong></th>
												 <th id='th' width=\"15%\"><strong> Supplier Name</strong></th>
												 <th id='th' width=\"20%\"><strong> Supplier Address</strong></th>
												 <th id='th' width=\"20%\"><strong> Manager Name</strong></th>
												 <th id='th' width=\"15%\"><strong> Contact No.</strong></th>
												 <th id='th' width=\"15%\"><strong> Email Adrress</strong></th>
												
												 
												 </tr>";  
											?>
											 
											
											<input type="button" name="delete" value="Delete"  onClick="setDelete2Action();" />
											<input type="button" name="update" value="Update" onClick="setUpdate2Action();" />
											
									<?php		
											while($array = mysql_fetch_array($result))
											{
									?>			<tr height="35" >
												<td  style='text-align:center;'> <input type="checkbox" name="users[]" value="<?php echo $array['supID']; ?>"> </td>
										
												 
												<td id='td' style="width:auto"> <?php echo $array['supName']; ?></td>
												<td id='td' style="width:auto"> <?php echo $array['supAddress']; ?></td>
												<td id='td' style="width:500px"> <?php echo $array['ownfName']; ?>&nbsp <?php echo $array['ownMI']; ?>&nbsp <?php echo $array['ownlName']; ?></td>
												<td id='td'> <?php echo $array['supContact']; ?></td>
												<td id='td'> <?php echo $array['supEmail'] ?></td>
												
												
												 
												</tr>		
										</form>											
									<?php
											}
											echo "</table>";	
										}
								echo '</div>';
								}
								else if(isset($_GET['AddSupp']) && $_GET['AddSupp'] == "Supp")
								{
								?>
										<div class="row">
											<div class="twelve columns">
												<div class="act">
													<h2>Add Supplier</h2>				
													<form name="form1" method="post" action="php/checkSupplyAdd.php">
														<table width="370" height="492">
														<tr>
															<td width="173" height="20"> SUPPLIER NAME: </td>
														  </tr>
														  <tr>
															<td><input type="text" name="Sname" id="Sname" size="29"  placeholder="Supplier Name" required/></td>
														  </tr>
														  <tr>
															<td height="20"> Supplier Address : </td>
															<td>&nbsp;</td>
															<td>&nbsp;</td>
														  </tr>
														  <tr>
															<td height="30" colspan="3"><input type="text" name="Address" id="Address" size="66" placeholder="Supplier Address" required/></td>
														  </tr>
														 <tr>
															<td width="173" height="20"> <h5> Manager Information: </h5></td>
														  </tr>
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
															<td width="173"> Contact number: </td>
															<td width="173">Email address: </td>
															<td width="62">&nbsp;</td>
														  </tr>
														  <tr>
															<td width="173"><input type="text" name="Cnum" id="Cnum" size="29" placeholder="Contact Number"/></td>
															<td colspan="2"><input type="text" name="email" id="email" size="40" placeholder="Email Address" required/></td>
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
										</div> 
								<?php
								}
								else if(isset($_GET['SupProd']) && $_GET['SupProd'] == "SupProd" )
								{
									echo '<style type="text/css">
											table
											{
												width: 100%;
											}
											table th, table thead td {
											background-color: grey;
											color: white;
											height: 3em;
											text-align: center;
											}
											caption, th, td {
												text-align: left;
												font-weight: normal;
												text-align: center;
											}
											table, td, th {
												vertical-align: middle;
											}
											td{
											font-size:20px;
											}
											</style>';
											
									$result = mysql_query("SELECT i.*,s.*,m.* FROM inventory as i , supplier as s, mobiledesc as m WHERE (i.SuppID = s.supID) AND (i.MobCode = m.MobCode) 	ORDER BY m.Model ASC");
									
									if(mysql_num_rows($result) > 0)
									{
									?>
											<p>&nbsp </p>
											<div class="search">
												<form name="form1" method="post" action="SupplyMaintenance.php?SupSear=SupSear">
												Search Supplier:
												<select name="supp" onchange='this.form.submit()'>
													<option value="">Please select </option>
													<?php
														$query = mysql_query("SELECT * FROM supplier");
														while($supp = mysql_fetch_array($query))
														{
															echo '<option value="' .$supp["supID"]. '" >' .$supp["supName"]. '</option>';
														}
													?>
												</select>
													
												</form>
											</div>
											 <table>
												<thead>
													<tr>
														<th> Product Name</th>
														<th> Supplier </th>
														<th> Category	</th>
														<th colspan="2"> Action	</th>
													</tr>
												</thead>
												<tbody>
									<?php
										while($row = mysql_fetch_array($result))
										{
									?>
											<tr>
											   <td class="reff">
													<div><?php echo $row['Model']; ?></div>
											   </td>
											   <td class="item">
													<div><?php echo $row['supName']; ?></div>
												</td>
												<td class="date">
													<div><?php echo $row['Type']; ?></div>
												</td>
												<td id='td'> <a href='#'> <img src='Images/logo/edit.png' alt='Edit Users Details' /></a></td>
												<td id='td'> <a href="JavaScript:if(confirm('Are you sure you want to Delete?')==true){window.location='#?username=<?=$row['IMEI'];; ?>';}"> <img src='Images/logo/delete.png' alt='Delete User' /></a></td>
											 </tr>
									<?php
										}
									?>
												<tr> 
													<td colspan="5"> <hr> </td>
												</tr>
												</tbody>
											</table>
									
									<?php	
									}
									else
									{	
											echo '<p>&nbsp</p>';
											echo '<span>You dont have any Product.</span><p>&nbsp</p>';
									}
								}
								else if(isset($_GET['SupSear']) && $_GET['SupSear'] == "SupSear" )
								{
									echo '<style type="text/css">
											table
											{
												width: 100%;
											}
											table th, table thead td {
											background-color: grey;
											color: white;
											height: 3em;
											text-align: center;
											}
											caption, th, td {
												text-align: left;
												font-weight: normal;
												text-align: center;
											}
											table, td, th {
												vertical-align: middle;
											}
											td{
											font-size:20px;
											}
											</style>';
											
									$result = mysql_query("SELECT i.*,s.*,m.* FROM inventory as i , supplier as s, mobiledesc as m WHERE (i.SuppID = s.supID) AND (i.MobCode = m.MobCode) AND i.SuppID = '".$_POST['supp']."'");
									
									if(mysql_num_rows($result) > 0)
									{
									?>
											<p>&nbsp </p>
											<div class="search">
												<form name="form1" method="post" action="SupplyMaintenance.php?SupSear=SupSear">
												Search Supplier:
												<select name="supp" onchange='this.form.submit()'>
													<option value="">Please select </option>
													<?php
														$query = mysql_query("SELECT * FROM supplier");
														while($supp = mysql_fetch_array($query))
														{
															echo '<option value="' .$supp["supID"]. '" >' .$supp["supName"]. '</option>';
														}
													?>
												</select>
													
												</form>
											</div>
											 <table>
												<thead>
													<tr>
														<th> Product Name</th>
														<th> Supplier </th>
														<th> Category	</th>
														<th colspan="2"> Action	</th>
													</tr>
												</thead>
												<tbody>
									<?php
										while($row = mysql_fetch_array($result))
										{
									?>
											<tr>
											   <td class="reff">
													<div><?php echo $row['Model']; ?></div>
											   </td>
											   <td class="item">
													<div><?php echo $row['supName']; ?></div>
												</td>
												<td class="date">
													<div><?php echo $row['Type']; ?></div>
												</td>
												<td id='td'> <a href='#'> <img src='Images/logo/edit.png' alt='Edit Users Details' /></a></td>
												<td id='td'> <a href="JavaScript:if(confirm('Are you sure you want to Delete?')==true){window.location='#?username=<?=$row['IMEI'];; ?>';}"> <img src='Images/logo/delete.png' alt='Delete User' /></a></td>
											 </tr>
									<?php
										}
									?>
												<tr> 
													<td colspan="5"> <hr> </td>
												</tr>
												</tbody>
											</table>
									
									<?php	
									}
									else
									{	
											echo '<p>&nbsp</p>';
											echo '<span>You dont have any Product.</span><p>&nbsp</p>';
									}
								}
								
								?>
							
							</div>
						</div>
					</div>  
				</div>
			</div>  
		</div>
	</div>   <!--bd-->
    <?php include("php/Footer.php") ?>

</div> <!-- Page -->
</body>
</html>