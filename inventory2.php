<?php
session_start();
	include_once("php/config.php");
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
		$setting = ' <li> <a href="POS.php"> POS </a> </li>';
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

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Point of Sales</title>
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
		<div id="bd" class="clearfix"> <!-- bd -->
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
								
								<?php
								
									if($_SESSION['login'] == "ADMIN")
									{
										echo ' <h6> INVENTORY </h6>
												<ul >
													<!--<li class="menu-level-0">
														<a class="" href="inventory2.php?Prod=Prod">New Product</a>
													</li>-->
													<li>
														<a href="inventory2.php?ProdL=ProdL">Product List</a>
													</li>
													<li>
														<a  href="inventory2.php?Categ=Categ">Category List </a>
													</li>
												</ul>';
									}
									
									if(isset($_GET['Prod']) && $_GET['Prod'] == "Prod")
									{
										
									?>
										<div class="search">
											<form name="form1" method="post" action="inventory2.php?Prod=Prod&&Type=Type">
											Select Type:
											<select name="type" onchange='this.form.submit()'>
												<option value="">Please select</option>
												<?php
													$query = mysql_query("SELECT * FROM categ ORDER BY CatName ASC");
													while($supp = mysql_fetch_array($query))
													{
														echo '<option value="' .$supp["supID"]. '" >' .$supp["CatName"]. '</option>';
													}
												?>
											</select>
											</form>
										</div>
									<?php
										if(isset($_GET['Type']) && $_GET['Type'] == "Type")
										{
									?>
											<style type="text/css">
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
											</style>
											<div class="row">
												<div class="twelve columns">
													<div class="act">
														<h2><?php echo $_POST['type'] ?></h2>				
														<form name="form1" method="post" action="inventory2.php">
															<table>
																<th> Supplier </th>
																<th> Product Name </th>
															<tr>
																<td> 
																	<select name="supp" required>
																		<option value="">Please select </option>
																		<?php
																			$result = mysql_query("SELECT * FROM supplier ORDER BY supName ASC");
																			while($supp = mysql_fetch_array($result))
																			{
																				echo '<option value="' .$supp["supID"]. '" >' .$supp["supName"]. '</option>';
																			}
																		?>
																	</select>
																	<font  color="Red" size="5px"> * </font> 
																</td>
																<td>
																	<select name="mob" required>
																		<option value="">Please select </option>
																		<?php
																			$result = mysql_query("SELECT * FROM mobiledesc WHERE Type = '".$_POST['type']."' ORDER BY Model ASC");
																			while($supp = mysql_fetch_array($result))
																			{
																				echo '<option value="' .$supp["MobCode"]. '" >' .$supp["Model"]. '</option>';
																			}
																		
																		?>
																	</select>
																	<font  color="Red" size="5px"> * </font> 
																</td>
															  </tr>
															  <tr>
																<td colspan="2" > <input name="submit" type="submit" value="ADD" /></td>
															  </tr>
															</table>
														</form>
													</div>
												</div> 
											</div> 
								<?php
										}
									}
									else if(isset($_GET['ProdL']) && $_GET['ProdL'] == "ProdL" )
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
												
										$result = mysql_query("SELECT i.*,s.*,m.* FROM inventory as i , supplier as s, mobiledesc as m WHERE (i.SuppID = s.supID) AND (i.MobCode = m.MobCode) ORDER BY m.Model ASC");
										
										if(mysql_num_rows($result) > 0)
										{
										?>
												<p>&nbsp </p>
												<div class="search">
													<form name="form1" method="post" action="inventory2.php?SupSear=SupSear">
													Search Supplier:
													<select name="supp" onchange='this.form.submit()'>
														<option value="">Please select </option>
														<?php
															$query = mysql_query("SELECT * FROM supplier ORDER BY supName ASC");
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
															<th> Quantity	</th>
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
													<td>
														<div><?php echo $row['PQty']; ?></div>
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
									else if(isset($_GET['Categ']) && $_GET['Categ'] == "Categ")
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
										$result = mysql_query("SELECT * FROM categ");
										echo '<a href="inventory2.php?AddCat=AddCat"> <input type="button" value="ADD CATEGORY"> </a>';
										if(mysql_num_rows($result) > 0)
										{
										?>
												<p>&nbsp </p>
												
												 <table>
													<thead>
														<tr>
															<th> Category</th>
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
														<div><?php echo $row['CatName']; ?></div>
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
									else if(isset($_GET['AddCat']) && $_GET['AddCat'] == "AddCat")
									{	
									?>
										<div class="row">
											<div class="twelve columns">
												<div class="act">
													<h2></h2>				
													<form name="form1" method="post" action="inventory2.php">
														<table>
														<tr>
															<td> CATEGORY: </td>
														  </tr>
														<tr>
															<td> 
																<input name="cat" type="text" placeholder="CATEGORY" size="30" required/>
																<font  color="Red" size="5px"> * </font>
															</td>
														  </tr>
														  <tr>
															<td>&nbsp;</td>
															<td > <input name="submit" type="submit" value="SAVE" /></td>
														  </tr>
														</table>
													</form>
												</div>
											</div> 
										</div> 
								<?php
									}
									else if(isset($_POST['submit']) && $_POST['submit'] == "ADD" )
									{
									
										$result = mysql_query("SELECT * FROM inventory WHERE MobCode='".$_POST['mob']."'");
										
										if(mysql_num_rows($result) == 0)
										{
											mysql_query("INSERT INTO inventory(MobCode,SuppID,Date) VALUES('".$_POST['mob']."','".$_POST['supp']."','".date ("y-m-d")."')")
												   or die("Query  : "  . mysql_error());
										
											echo '<script> alert("Successfully Added") 
												window.location.href="inventory2.php?ProdL=ProdL";
											</script>';
										}
										else
										{
											echo '<script> alert("Product is already added Please Choose another") 
													window.location.href="inventory2.php?Prod=Prod";
												</script>';
										}
										
									}
									else if(isset($_POST['submit']) && $_POST['submit'] == "SAVE" )
									{
										mysql_query("INSERT INTO categ(CatName) VALUES('".$_POST['cat']."')")
												   or die("Query  : "  . mysql_error());
												   
										echo '<script> alert("Successfully Added"); 
											window.location.href="inventory2.php?Categ=Categ";
											</script>';
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
											
									$result = mysql_query("SELECT i.*,s.*,c.* FROM inventory as i , supplier as s, categ as c WHERE (i.SuppID = s.supID) AND (i.CatID = c.CatID) AND i.SuppID = '".$_POST['supp']."'");
									
									if(mysql_num_rows($result) > 0)
									{
									?>
											<p>&nbsp </p>
											<div class="search">
												<form name="form1" method="post" action="inventory2.php?SupSear=SupSear">
												Search Supplier:
												<select name="supp" onchange='this.form.submit()'>
													<option value="">Please select </option>
													<?php
														$query = mysql_query("SELECT * FROM supplier ORDER BY supName ASC");
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
													<div><?php echo $row['ProdName']; ?></div>
											   </td>
											   <td class="item">
													<div><?php echo $row['supName']; ?></div>
												</td>
												<td class="date">
													<div><?php echo $row['CatName']; ?></div>
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
				<div class="row">
					<div class="twelve columns">
						
					</div>
				</div>
			</div><!-- top Slot -->		
		</div> <!-- bd -->
		<?php include("php/Footer.php") ?> <!-- Footer -->
       
	</div>
</body>
</html>
