<?php
session_start();
	include_once("php/config.php");
	require_once('calendar/classes/tc_calendar.php');
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
<title>Purchase</title>
<link rel="stylesheet" href="CSS/Cellworks.css" type="text/css" />
<link rel="stylesheet" href="CSS/CellworksNav.css" type="text/css" />
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />

<script src="Javascript/jqueryinst.js" type="text/javascript"></script>
<script type="text/javascript" src="Javascript/jQuery v1.7.js"></script>
<script type="text/javascript" src="Javascript/Cellworks.js"></script>
<script src="Javascript/basic.js" type="text/javascript"></script>
<script language="javascript" src="calendar/calendar.js"></script>
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
										echo ' <h6> ORDER </h6>
												<ul >
													<li>
														<a href="Purchased.php?PurAdd=PurAdd"> Purchase Order </a>
													</li>
													<li>
														<a href="Purchased.php?PurDer=PurDer">Order list</a>
													</li>
													<li>
														<a  href="Purchased.php?Receive=Rece">Receive Order </a>
													</li>
													<li class="menu-level-0">
														<a class="" href="Purchased.php?Order=Order">Sales Order(s)</a>
													</li>
													<li>
														<a href="#">Sales Reports </a>
													</li>
												</ul>';
									}
									
									if(isset($_GET['Order']) && $_GET['Order'] == "Order")
									{
										include_once('itemPurchased.php');
									}
									else if(isset($_GET['PurDer']) && $_GET['PurDer'] == "PurDer" )
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
													font-weight: normal;
													text-align: center;
												}
												table, td, th {
													vertical-align: middle;
												}
												td{
												font-size:20px;
												}
												</style> ';
												
										
										$result = mysql_query("SELECT DISTINCT p.*,s.*,m.* FROM mobiledesc as m, purorder as p, supplier as s WHERE(p.SuppID = s.supID) AND  p.MobCode = m.MobCode order by OrderNo");
										if(mysql_num_rows($result) > 0)	
										{
										?>
											
												<p>&nbsp </p>
												<div class="search">
													<form name="form1" method="post" action="Purchased.php?SupSear=SupSear">
													Search by: &nbsp
													<select name="supp" onchange='this.form.submit()'>
														<option value="">SUPPLIER </option>
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
															<th> Order No.</th>
															<th> Reference</th>
															<th> Product</th>
															<th> Supplier Name</th>
															<th> Quantity </th>
															<th> Order Date	</th>
															<th> Status	</th>
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
														<div><?php echo $row['OrderNo']; ?></div>
												   </td>
												   <td class="reff">
														<div><?php echo $row['Reference']; ?></div>
												   </td>
												   <td class="reff">
														<div><?php echo $row['Model']; ?></div>
												   </td>
												   <td class="item">
														<div><?php echo $row['supName']; ?></div>
													</td>
													<td class="date">
														<div><?php echo $row['MQty']; ?></div>
													</td>
													<td class="date">
														<div><?php echo $row['OrdeDate']; ?></div>
													</td>
													<td class="date">
														<div><?php echo $row['Status']; ?></div>
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
									else if(isset($_GET['Receive']) && $_GET['Receive'] == "Rece" )
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
										<p>&nbsp </p>
										<form name="form1" action="Purchased.php?Receive=Rece" method="post">
											<label> Enter Reference no.: </label> <input type="text" name="ref" placeholder="Reference number"> <input type="submit" name="submit" value="submit">
										</form>

										<?php
										if(isset($_POST['ref']))
										{
											$result2 = mysql_query("SELECT p.*,s.* FROM purorder as p,supplier as s WHERE s.supID = p.SuppID and p.Reference = '".$_POST['ref']."' AND Status='Pending'  ");
											if(mysql_num_rows($result2) > 0)
											{
											$row2=mysql_fetch_array($result2);

											$_SESSION['rSupp'] = $row2['supID'];
											$_SESSION['rDate'] = date ("Y-m-d");
											$_SESSION['rRef'] = $_POST['ref'];
										?>
										<form name="form1" action="Purchased.php?ReceAdd=ReceAdd" method="post">
											<hr>
											<table>
												<tr>
													<td>
														Supplier:<label> <?php echo $row2['supName']; ?> </label> 
													</td>
												</tr>
												<tr>
													<td>
														Referrence No:<label> <?php if(isset($_POST['ref']))  echo  $_POST['ref']; ?> </label> 
													</td>
													
													<td>
														Date/Time: <?php echo date ("Y-m-d h:i:s"); }?>
													</td>
												</tr>
												<tr >
													<td colspan="2">
													<hr>
													</td>
												</tr>
											</table>
											<table>
												<tr>
													<th> ID </th>
													<th> Product </th>
													<th> Status </th>
													<th> Quantity </th>
												</tr>
											<?php
											
												$result = mysql_query("SELECT p.*,m.* FROM purorder as p, mobiledesc as m WHERE (p.MobCode = m.MobCode) and Reference = '".$_POST['ref']."' AND Status='Pending'  ");
												$ct = 1;
												if(mysql_num_rows($result) > 0)
												{
													while($row=mysql_fetch_array($result))
													{
														$_SESSION['MobCode'][$ct] = $row['MobCode'];
											?>
														<tr>
															<td> <?php echo $ct; ?> </td>
															<td> <?php echo $row['Model']; ?> </td>
															<td> <?php echo $row['Status']; ?> </td>
															<td> <input id="qty" type="text" name="qty[<?php echo $ct ?>]" size="5" required> </td>
														</tr>
													
										
									<?php
														$ct++;
													}
												}
											}
									?>
												</table>
												<table>
													<tr>
														<td colspan="3">
															<hr>
														</td>
													</tr>
													<tr >
														<td colspan="2">
														<input type="submit" value="SAVE">
														</td>
													</tr>
												</table>
											</form>

									<?php
									}
									else if(isset($_GET['ReceAdd']) && $_GET['ReceAdd'] == "ReceAdd" )
									{
										$ItemCnt = count($_POST['qty']);


										for($i=1; $i<=$ItemCnt; $i++)
										{
											$result = mysql_query("SELECT * FROM purorder WHERE (Reference='".$_SESSION['rRef']."') AND  (MobCode = '".$_SESSION['MobCode'][$i]."') AND  SuppID='".$_SESSION['rSupp']."' ");
											$row = mysql_fetch_array($result);

											if($row['MQty'] >= $_POST['qty'][$i] || $row['MQty'] > 0)
											{
												mysql_query("INSERT INTO inventory(MobCode,SuppID,PQty,Date) VALUES('".$_SESSION['MobCode'][$i]."','".$_SESSION['rSupp']."','".$_POST['qty'][$i]."','".$_SESSION['rDate']."')") or die ("error");
												$mqty = $row['MQty'];
												$PQty = $_POST['qty'][$i];
												$qty =  $mqty - $PQty;

												mysql_query("UPDATE purorder SET MQty='".$qty."' ,Status='Approve' WHERE (Reference='".$_SESSION['rRef']."') AND  (MobCode = '".$_SESSION['MobCode'][$i]."') AND  SuppID='".$_SESSION['rSupp']."' ") or die ("error update");
												
												$stop = 1;
											}
											else
											{
												echo '<script> alert("Receive Quantity is Greater than Order Quantity") 
													;
												  </script>';
												  $stop = 2;
											}
											
										}	   
											if($stop == 1)
											{
											echo '<script> alert("Successfully Added") 
													window.location.href="inventory2.php?ProdL=ProdL";
												  </script>';
											}
										
										
									}
									else if(isset($_GET['PurAdd']) && $_GET['PurAdd'] == "PurAdd" )
									{
									?> 
											<form method="post" action="Purchased.php?AddSupp=AddSupp">
												Search: <select name="supp" onchange='this.form.submit()'>
													<option value="">Please Select Supplier </option>
													<?php
														$result = mysql_query("SELECT * FROM supplier");
														
															while($supp = mysql_fetch_array($result))
															{
																echo '<option value="' .$supp["supID"]. '" >' .$supp["supName"]. '</option>';
															}
													?>
												</select>
											</form>											
									<?php
									}
									else if(isset($_GET['AddSupp']) && $_GET['AddSupp'] == "AddSupp" )
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
										
										<form method="post" action="Purchased.php?AddSupp=AddSupp">
											Search:
												<select name="supp" onchange='this.form.submit()'>
													<option value="">Please Select Supplier </option>
													<?php
														$result = mysql_query("SELECT * FROM supplier");
														
															while($supp = mysql_fetch_array($result))
															{
																echo '<option value="' .$supp["supID"]. '" >' .$supp["supName"]. '</option>';
															}
													?>
												</select>
										</form>	
										<h2>
											<?php
												$result = mysql_query("SELECT * FROM supplier WHERE supID='".$_POST['supp']."'");
									
												$supp = mysql_fetch_array($result);
												
													echo $supp["supName"];
													$_SESSION['supp'] = $_POST['supp'];
												
												
											?>
										</h2>
										<div>
										<?php
											$alphabet = "0123456789";
											    $reff = array(); 
		
											    $alphaLength = strlen($alphabet) - 1; 
												
												
												for($c = 0; $c < 1; $c++)
												{
													
													for ($i = 0; $i < 10; $i++) {
														$n = rand(0, $alphaLength);
														
														$reff[$i] = $alphabet[$n];
													}	
													
													$nreff[] = implode($reff);
												}
												
												
												
												for($a = 0; $a < count($nreff); $a++)
												{
													$_SESSION['nreff'] = $nreff[$a]; 
													
												}
											?>		

											<table>
												<tr>
													<td>
														Referrence No:<label> <?php echo $_SESSION['nreff']; ?> </label> 
													</td>
													
													<td>
														Date/Time: <?php echo date ("Y-m-d h:i:s"); ?>
													</td>
												</tr>
												<tr >
													<td colspan="2">
													<hr>
													</td>
												</tr>
												<tr>
												<td>
														<input onclick="addRow(this.form);" type="button" value="Add Product row" />
													</td>
												</tr>
											</table>								
											<form name="form1" method="post" action="Purchased.php?Add=Add">
												
													<hr>
												<div id="itemRows">

												</div>	 
												<hr>
												<input name="submit" type="submit" value="ADD" /> 
											</form>	
										</div>
										<script type="text/javascript">
											var rowNum = 0;
											function addRow(frm) {
												rowNum ++;
												var row = '<p id="rowNum'+rowNum+'"><label>'+rowNum+'.)</label>  Item Name: <select name="mob['+rowNum+']" required> <option value=""> Please select </option> <?php
																	$result = mysql_query("SELECT m.* FROM supplier as s, mobiledesc as m WHERE (s.supID = m.supID) and (s.supID = '".$_POST['supp']."')");
																	
																	while($Prod = mysql_fetch_array($result))
																	{
																		echo '<option value="' .$Prod["MobCode"]. '" >' .$Prod["Model"]. '</option>';
																	} 
																?> </select> <font  color="Red" size="5px"> * </font> Item Quantity: <input type="text" name="qty['+rowNum+']" size="25"  placeholder="Quantity" required/> <font  color="Red" size="5px"> * </font> <input type="button" value="Remove" onclick="removeRow('+rowNum+');"> </p>';
												jQuery('#itemRows').append(row);
											
											}

											function removeRow(rnum) {
												jQuery('#rowNum'+rnum).remove();
												alert(rnum);
					
											}
										</script>
									<?php
										
									}
									else if(isset($_GET['Add']) && $_GET['Add'] == "Add" )
									{
						
										$ItemCnt = count($_POST['mob']);
										for($i=0; $i<=$ItemCnt; $i++) 
										{

											mysql_query("INSERT INTO purorder(Reference,SuppID,MobCode,MQty,Status,OrdeDate) VALUES('".$_SESSION['nreff']."','".$_SESSION['supp']."','".$_POST['mob'][$i]."','".$_POST['qty'][$i]."','Pending','".date ("Y-m-d")."')");

										}

										echo '<script> alert("Successfully Added") 
													window.location.href="Purchased.php?PurDer=PurDer";
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
												
										$result = mysql_query("SELECT DISTINCT p.*,s.*,m.* FROM mobiledesc as m, purorder as p, supplier as s WHERE(p.SuppID = s.supID) AND  p.MobCode = m.MobCode AND p.SuppID = '".$_POST['supp']."'");
							
										
										if(mysql_num_rows($result) > 0)
										{
										?>
											
												<p>&nbsp </p>
												<div class="search">
													<form name="form1" method="post" action="Purchased.php?SupSear=SupSear">
													Search by: &nbsp
													<select name="supp" onchange='this.form.submit()'>
														<option value="">SUPPLIER </option>
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
															<th> Order No.</th>
															<th> Reference</th>
															<th> Product</th>
															<th> Supplier Name</th>
															<th> Quantity </th>
															<th> Order Date	</th>
															<th> Status	</th>
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
														<div><?php echo $row['OrderNo']; ?></div>
												   </td>
												   <td class="reff">
														<div><?php echo $row['Reference']; ?></div>
												   </td>
												   <td class="reff">
														<div><?php echo $row['Model']; ?></div>
												   </td>
												   <td class="item">
														<div><?php echo $row['supName']; ?></div>
													</td>
													<td class="date">
														<div><?php echo $row['MQty']; ?></div>
													</td>
													<td class="date">
														<div><?php echo $row['OrdeDate']; ?></div>
													</td>
													<td class="date">
														<div><?php echo $row['Status']; ?></div>
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
