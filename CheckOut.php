<?
session_start();
	include_once("php/config.php");
	
	$total = '';
	$logio = '';
	$head  = '';
	$setting = '';
	
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
		<div class=" row">
			<div class="twelve columns">
				<div id="content-slot" class="span-24 last">
					<div id="shopping-cart-page">
						<div id="shopping-cart-items">
							<h3 class="section-header"> Checkout  </h3>
							<div class="clearfix">
								<form method="post" action="">
									<?php	
											
											
										if(isset($_GET['Continue']) && $_GET['Continue'] == "Continue") //if Continue is Click
										{
											$result = mysql_query("SELECT * FROM shoppingcart WHERE UserName='".$_SESSION['user']."'");
											if(mysql_num_rows($result) > 0)
											{
												while($shop = mysql_fetch_array($result))
												{
													$result2 = mysql_query("SELECT * FROM shoppingcart AS sc, login AS log , phon_imei as pi, mobiledesc as md
													WHERE (sc.UserName = log.username) AND  (sc.MobCode = pi.MobCode) AND  (sc.MobCode = md.MobCode) AND (sc.MobCode = '".$shop['MobCode']."')");
															
													if(mysql_num_rows($result2) > 0)
													{
														$row = mysql_fetch_array($result2);
														
														$used = true;
														while($used)
														{
															$string = rand(0, 9999);
															$string2 = rand(0, 9999);
															$refnum = "CW-".$string."-".$string2."-DE";
															$query = mysql_query("SELECT * FROM itempurchased WHERE ReffNum='".$refnum."'"); //check if the Reference Number is already use.
															if(!mysql_num_rows($query)) //if Ref 
															{
																 $check=mysql_query("SELECT * FROM inventory WHERE Mobcode='".$shop['MobCode']."' AND PQty > 0"); 
																
																if(mysql_num_rows($check)> 0)
																{
																	$row2 = mysql_fetch_array($check);
																	mysql_query("INSERT INTO itempurchased (ReffNum,MobCode,Price,cUser,DatePurch) 
																	VALUES('".$refnum."','".$row2['MobCode']."','".$row['Price']."','".$row['UserName']."','".date ("y/m/d")."')");
																
																	$qty = $row2['PQty'] - 1;
																	mysql_query("UPDATE inventory SET PQty ='".$qty."' WHERE (Mobcode='".$shop['MobCode']."')"); //update Inventory
																	mysql_query("DELETE FROM shoppingcart WHERE Mobcode='".$shop['MobCode']."'"); //Delete if the Item is already checkout
																	$used = false;	
																}	
															}
														}	
													}		
												}
											}
																					
											echo '<div  class="butt">
													<p> Your Order is being process. please check your Order Account for The Reference </p>
													<p> &nbsp </p>
													<a  href="index.php">Continue Shopping</a>
													<a href="myAccount.php?orders=Orders">
														My orders
													</a>
												  </div>';
										}
										else
										{
											$result = mysql_query("SELECT * FROM mobiledesc AS md ,shoppingcart AS sc WHERE (md.MobCode = sc.MobCode) AND sc.username='".$_GET['CheckOut']."'");
											if(mysql_num_rows($result) > 0)
											{
										
											echo'	<table>
														<thead>
															<tr>
																<th> Product Title </th>
																<th> Ships in </th>
																<th> Price </th>
																<th> Date </th>
															</tr>
														</thead>
														<tbody>';
										
												while($row = mysql_fetch_array($result))
												{
													echo '<tr>';
													echo '   <td class="item">';
													echo '    	<div>'.$row['Model'].'"</div>';
													echo '    </td>';
													echo '    <td class="date">';
													echo '    	<div>'.$row['sDay'].'</div>';
													echo '    </td>';
													echo '    <td class="prce">';
													echo '    	<div>Php'.$row['Price'].'</div>';
													echo '    </td>';
													echo '    <td class="date">';
													echo '    	<div>'.$row['Date'].'</div>';
													echo '    </td>';
													echo '</tr>';
													$total = $total + $row['Price'];
												}
											
													echo '	<tr> 
																<td colspan="6"> <hr> </td>
															</tr>
															<tr> 
																<td></td>
																<td></td> 										
																<td> Total = Php '.$total.' </td>
																<td>  </td> 
															</tr>
													
														</tbody>
													</table>';
											
													echo '	<div  class="butt">
																<a style="float:left;width: 8em;" href="ShoppingCart.php">Back</a>
																<a style="float:right;width: 10em;" href ="CheckOut.php?Continue=Continue"> Continue </a>
															</div>';
											}
											else
											{
													echo '<div  class="butt"><span>You Dont Have any Items in Shopping Cart.</span><p>&nbsp</p>
														  <a  href="index.php">Continue Shopping</a> </div>';
											}
										}
									?>
								</form>
							</div>
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