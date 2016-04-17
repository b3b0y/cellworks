<?
session_start();
	include_once("php/config.php");

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
	else if(isset($_SESSION['login']) && $_SESSION['login'] == "ADMIN")
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
	
    <?php include("php/Header.php") ?> <!-- HD -->
	<div id="bd" class="clearfix">
        <div class="row">
        	<div class="twelve columns">	
				<div class="clearfix">
                	<div class="row">
        				<div class="twelve columns">
                        	<p> &nbsp; </p>
                        </div>
                    </div>
					<div class="span-5" id="left-slot">
						 <div id="facets">
							<div id="" class="clearfix facet">
								<h6> Category </h6>
								<ul class="browse-tree">
									<li class="menu-level-0">
										<a class="" href="#">Mobiles & tablet</a>
									</li>
									<li>
										<a href="#">Accesories </a>
									</li>
									<li>
										<a href="#">Warranty & Insurance </a>
									</li>
									<li>
										<a href="#">Accesories </a>
									</li>
									<li>
										<a href="#">More </a>
									</li>         
								</ul>
								<div class="facet-footer">
								</div> 
							</div> <!-- Category -->
							<div id="" class="clearfix facet">
								<h6> Brand </h6>
								<ul class="browse-tree">
									<li class="">
										<a href="#"> Apple </a>
									</li>
									<li class="">
										<a href="#"> Nokia </a>
									</li>
									<li class="">
										<a href="#"> Samsung </a>
									</li>
									<li class="">
										<a href="#"> O+ </a>
									</li>
									<li class="">
										<a href="#"> Myphone </a>
									</li>
									<li class="">
										<a href="#"> Cherry Mobile </a>
									</li>
									<li class="">
										<a href="#"> Alcatel </a>
									</li>
								</ul>            
								<div class="facet-footer">
								</div>
							</div>	<!-- Brand -->
						</div>
					</div>  <!-- Left Slot -->
					<div class="span-19 last" id="content-slot"> 
						<div id="search-results">  
							<div class="clearfix">				
							</div>
							<h1 id="browse-node-display-name"><?php echo $_GET['Tablet']; ?></h1>
							<div class="clearfix">            
								<ul id="search-result-items" class="grid-view  clearfix">
								<?php
									$besbuy = mysql_query("Select ImagePath,Model,Price FROM tabletdesc WHERE Brand ='".$_GET['Tablet']."' or Type='".$_GET['Tablet']."'");
										if(mysql_num_rows($besbuy) > 0)
										{
											while($row = mysql_fetch_array($besbuy))
											{
												echo '<li class="clearfix">';
												echo '	<div class="variant-wraper">';
												echo '		<div class="variant-image">';
												echo '			<a href="PhoneInfo.php?Phone='.$row["Model"].'"  title="'.$row["Model"].'"> <img class="butt"  alt="'.$row["Model"].'" src="'.$row["ImagePath"].'" /></a>';	
												echo '		</div>'; 
												echo '		<div class="variant-desc">';
												echo '			<span class="variant-title">';
												echo '			<a href="PhoneInfo.php"> '.$row["Model"].' </a>';
												echo '			</span>';
												echo '			<span class="contributors">';
												echo '				<span class="">';
												echo '					<a></a>';
												echo '				</span>';
												echo '			</span>';
												echo '			<span class="price">';
												echo '				<span class="variant-final-price">';
												echo '					P'.$row["Price"];
												echo '				</span>';
												echo '			</span>';
												echo '			<span class="buy-now">';
													if(isset($_SESSION['login']) && $_SESSION['login'] == "USER")
														{
															echo '<a href="PhoneInfo.php?Phone='.$row["Model"].'"> <input type="submit" value="buy now!" /> </a>';
														}
														else
														{
															echo '<a href="PhoneUpdate.php?Update='.$row["Model"].'"> <input type="button" value="Update" /> </a>';
														}
												echo '			</span>';
												echo '		</div>';
												echo '	</div>';
												echo '</li>';
											}
										}
									?>
								</ul>
							</div>
						</div> 
					</div> 
				</div> 
			</div>
		</div>
    </div>                 		
	<?php include("php/Footer.php") ?>
</div>
</body>
</html>
