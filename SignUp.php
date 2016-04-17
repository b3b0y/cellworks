<?php
session_start();
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
		session_destroy();
	}
	
	$Ln = $_SESSION['Ln'];
	$Fn = $_SESSION['Fn'];
	$Mi = $_SESSION['Mi'];
	$add = $_SESSION['add'];
	$cnum = $_SESSION['cnum'];
	$email = $_SESSION['email'];
	$uname = $_SESSION['uname']; 
	$pass = $_SESSION['pass'];
	$cpas = $_SESSION['cpass'];  
	$succ  = $_SESSION['succ'];
	$fail = $_SESSION['Fail'];
	

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
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
			<div class="row">
				<div class="twelve columns">
					<div id="top-slot" class="clearfix">
						<div class="row">
							<div class="twelve columns">
								<table width="500" height="48">
									<tr>
										<td width="485" height="42">
											<?php echo '<font color="red">'.$Ln  . $Fn  . $Mi  . $add  . $cnum  . $email  . $uname  . $pass . $cpas  . $succ . $fail .'<font color="red">' ;  ?>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="clearfix">
						
					</div>
				</div>
			</div>		
		</div> <!-- bd -->
		<?php include("php/Footer.php") ?> <!-- Footer -->
       
	</div>
</body>
</html>
