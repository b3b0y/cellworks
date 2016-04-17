<?
session_start();
$logio = '';
		$setting = '';
		$head = '';
	
	if(isset($_SESSION['login']) && $_SESSION['login'] == "USER")
	{
		$logio = '<li> <a href="php/Logout.php"> Logout </a> </li>';
		$head = '<li> | </li>
		<li><a href="myAccount.php"> My Account </a></li> 
		<li> | </li>
		<li><a class="shopping-cart" href="ShoppingCart.php"> Shopping Cart </a></li>';
	
	}
	else if(isset($_SESSION['login']) && $_SESSION['login'] == "ADMIN" )
	{
		$logio = ' <li> <a href="php/Logout.php"> Logout </a> </li> <li> | </li>';
		$setting = ' <li> <a class="sett" > Dashboard </a> </li>';
		$head = '<li> | </li>
		<li><a href="myAccount.php"> My Account </a></li> ';
	}
	else if(isset($_SESSION['login']) && $_SESSION['login'] == "CASHIER")
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

<html>
<head> <title> My Account </title>
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
			<div class="clearfix">
				<div id="left-slot" class="span-5">
					<div class="account-nav">
						<h3 class="head">
							My Account
						</h3>
						<ul>
							<li>
								<a href="myAccount.php?">
									Overview
								</a>
							</li>
							<li>
								<a href="myAccount.php?orders=Orders">
									My orders
								</a>
							</li>
							<li>
								<a href="#">
									
								</a>
							</li>
							<li>
								<a href="myAccount.php?update=Update">
									Update pofile
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div id="content-slot" class="span-19 last">
					<div class="my-account-page">
						<div class="clearfix">
							<div class="row">
								<div class="twelve columns">
									<div class="act">
										<?php
											if(isset($_GET['update']) == "Update")
											{
												include_once("Account/AccntUp.php");
											}
											else if(isset($_GET['cpass']) == "change")
											{
												include_once("Account/changepass.php");
											}
											else if(isset($_GET['orders']) == "Orders")
											{
												include_once("Account/MyOrders.php");
											}
											else
											{
												include_once("Account/Overview.php");
											}
										?>
									</div>
								</div> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- bd -->
		<?php include("php/Footer.php") ?> <!-- Footer -->

</div>
</body>
</html>