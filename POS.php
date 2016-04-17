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
									if($_SESSION['login'] == "CASHIER")
									{
										echo ' <h6> CASHIER </h6>
												<ul >
													<li class="menu-level-0">
														<a class="" href="POS.php?Cash=Cash">CASH</a>
													</li>
													<li>
														<a  href="#">CREDIT </a>
													</li>
													<li>
														<a href="#">REPORTS </a>
													</li>
													<li>
														<a href="#">[Title here] </a>
													</li>
													<li>
														<a href="#">[Title here] </a>
													</li>         
												</ul>';
									}
									else if($_SESSION['login'] == "ADMIN")
									{
										echo ' <h6> CASHIER </h6>
												<ul >
													<li class="menu-level-0">
														<a class="" href="POS.php?Cash=Cash">CASH</a>
													</li>
													<li>
														<a  href="#">CREDIT </a>
													</li>
													<li>
														<a href="#">Sales Reports </a>
													</li>
													<li>
														<a href="#">Purchase </a>
													</li>
													<li>
														<a href="#">Supplier </a>
													</li>         
												</ul>';
									}
									
									if(isset($_GET['Cash']) == "Cash")
									{
							
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
