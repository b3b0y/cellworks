<?
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
		<div class=" row">
			<div class="twelve columns">
				<div id="content-slot" class="span-24 last">
					<div id="shopping-cart-page">
						<div id="shopping-cart-items">
							<h3 class="section-header"> Shopping Cart  </h3>
							<div class="clearfix">
								<form method="post" action="">
									
										<?php	
										
											$result = mysql_query("SELECT * FROM shoppingcart AS sc, mobiledesc AS md 
													WHERE (sc.MobCode = md.MobCode) AND (sc.UserName='".$_SESSION['user']."')");
											if(mysql_num_rows($result) > 0)
											{
										?>
												<table>
													<thead>
														<tr>
															<th> Shopping Cart Items  </th>
															<th> Product Title	</th>
															<th> Price	</th>
															<th> Date	</th>
														</tr>
													</thead>
													<tbody>
										<?php
												while($row = mysql_fetch_array($result))
												{
													echo '<tr>';
													echo '   <td class="item">';
													echo '    	<div><img width="50" height="60" src="'.$row['ImagePath'].'"</div>';
													echo '      <div>Item Added on '.$row['Date'].'</div>';	
													echo '      <div><a href="php/cartDel.php?del='.$row['sID'].'"><img width="13" height="13" src="Images/logo/delete.png">Delete</a></div>';	
													echo '    </td>';
													echo '    <td class="model">';
													echo '    	<div>'.$row['Model'].'</div>';
													echo '    </td>';
													echo '    <td class="Price">';
													echo '    	<div>Php'.$row['Price'].'</div>';
													echo '    </td>';
													echo '    <td class="date">';
													echo '    	<div>'.$row['Date'].'</div>';
													echo '    </td>';
													echo '</tr>';
												}
											?>
														<tr> 
															<td colspan="6"> <hr> </td>
														</tr>
													
													</tbody>
												</table>
											<?php
											}
											else
											{
													echo '<span>Your Shopping cart is empty.</span><p>&nbsp</p>';
											}
										?>
									<div  class="butt">
										<a  href="index.php">Continue Shopping</a>
										<a style="float:right;width: 15em;" href ="CheckOut.php?CheckOut=<?php echo $_SESSION['user'] ?>"> Proceed To Checkout </a>
									</div>
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