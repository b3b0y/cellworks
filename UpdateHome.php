<?
session_start();
	$var = $_SESSION['altimg'];

	if(!isset($_SESSION['login'])) 
	{
            header("Location: index.php");
	} 
	
	if($_SESSION['login'] == "USER")
	{
		$logio = '<li> <a href="php/Logout.php"> Logout </a> </li>';
		$button =  '<input class="" type="submit" value="buy now!" />';
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
		$buynow =  '<input class="" type="submit" value="buy now!" />';
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
	
    <?php include("php/Header.php") ?> <!-- HD -->
	<div id="bd" class="clearfix">
        <div class="row">
        	<div class="twelve columns">    	
                <div id="top-slot">
                    <div class="row">
                        <div class="twelve columns">
                            <div class="html-widget top clearfix">
								<p> &nbsp </p>
                            </div>            
                        </div>
                    </div>
                </div><!-- top Slot -->
				<div class="clearfix">
                    <div class="span-19 last" id="content-slot"> 
						<div class="product-list-widget content clearfix">
							<div class="row">
								<div class="twelve columns">
									<h3 class="list-title "> Slide Update </h3>
									<p style="color:red;font-weight:bold;"><?php echo $_SESSION['sop'] . $var; ?></p>
									<form name="submitS" method="post" action="php/checkHome.php">
										<ul>
											<li>
												<div class="variant-wraper">
													<span Style="font-weight:bold;"> Select Column number of the image: </span>
													<select name="slideop">
														<option selected />
														<option value="1"/>1
														<option value="2"/>2
														<option value="3"/>3
														<option value="4"/>4
													<select>
													<input type="file" name="slide">
													<span Style="font-weight:bold;">Slide Name: <input type="text" name="pager" size="30" required></span>
													<span><input type="submit" name="submitS" value="save"></span>
													<input type="reset">
												</div>
											</li>
										</ul>
									</form>
								</div>
							</div>
						</div> 
                        <div class="product-list-widget content clearfix">
                            <div class="row">
                                <div class="twelve columns">
                                    <h3 class="list-title "> Best Buys Update</h3>
									<p style="color:red;font-weight:bold;"><?php echo $_SESSION['bop']; ?></p>
										<form name="submitB" method="post" action="php/checkHome.php">
										<ul>
											<li>
												<div class="variant-wraper">
													<span Style="font-weight:bold;"> Select Column number of the image: </span>
													<select name="bestop">
														<option selected />
														<option value="1"/>1
														<option value="2"/>2
														<option value="3"/>3
														<option value="4"/>4
													<select>
													<span Style="font-weight:bold;">Model Code: <input type="text" name="modb" size="30"required></span>
													<input type="submit" name="submitB" value="save">
													<input type="reset">
												</div>
											</li>
										</ul>
									</form>
                                </div>
                            </div>
                        </div> <!-- Best buy -->
                        <div class="product-list-widget content clearfix">
                            <div class="row">
                                <div class="twelve columns">
                                    <h3 class="list-title"> New Release Update</h3>
									<p style="color:red;font-weight:bold;"><?php echo $_SESSION['nop']; ?></p>
                                    <form name="submitN" method="post" action="php/checkHome.php">
										<ul>
											<li>
												<div class="variant-wraper">
													<span Style="font-weight:bold;"> Select Column number of the image: 
													<select name="newop">
														<option selected />
														<option value="1"/>1
														<option value="2"/>2
														<option value="3"/>3
														<option value="4"/>4
													<select>
													</span>
													<span Style="font-weight:bold;">Model Code: <input type="text" name="modn" size="30" required></span>
													<input type="submit" name="submitN" value="save">
													<input type="reset">
												</div>
											</li>
										</ul>
									</form>
								</div>	
                            </div>            
                        </div> <!-- New Release -->
                        <div class="product-list-widget content clearfix">
                            <div class="row">
                                <div class="twelve columns">
                                    <h3 class="list-title"> Hot Phones! Update</h3>
									<p style="color:red;font-weight:bold;"><?php echo $_SESSION['hop']; ?></p>
                                    <form name="submitH" method="post" action="php/checkHome.php">
										<ul>
											<li>
												<div class="variant-wraper">
													<span Style="font-weight:bold;"> Select Column number of the image: </span>
													<select name="hotop">
														<option selected />
														<option value="1"/>1
														<option value="2"/>2
														<option value="3"/>3
														<option value="4"/>4
													<select>
													<span Style="font-weight:bold;">Model Code: <input type="text" name="modh" size="30" required></span>
													<input type="submit" name="submitH" value="save">
													<input type="reset">
												</div>
											</li>
										</ul>
									</form>
								</div>
                            </div>
                        </div> <!-- Best Buy -->
                        <div class="product-list-widget content clearfix">
                            <div class="row">
                                <div class="twelve columns">
                                    <h3 class="list-title"> Accesories Update</h3>
									<p style="color:red;font-weight:bold;"><?php echo $_SESSION['aop']; ?></p>
                                    <form name="submitA" method="post" action="php/checkHome.php">
										<ul>
											<li>
												<div class="variant-wraper">
													<span Style="font-weight:bold;"> Select Column number of the image: </span>
													<select name="Acceop">
														<option selected />
														<option value="1"/>1
														<option value="2"/>2
														<option value="3"/>3
														<option value="4"/>4
													<select>
													<span Style="font-weight:bold;">Model Code: <input type="text" name="moda" size="30" required></span>
													<input type="submit" name="submitA" value="save">
													<input type="reset">
												</div>
											</li>
										</ul>
									</form>
								</div>        
                            </div>
                        </div>	<!-- Accesories -->
                    </div> <!-- Content Slot -->
                </div> 
    		</div>
        </div>                 		
	</div> <!--bd-->
	<?php include("php/Footer.php") ?> <!-- Footer -->

</div> <!-- Page -->
</body>
</html>