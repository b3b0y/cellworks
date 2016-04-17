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
	
	if(isset($_SESSION['Fail']) == 1)
	{
		echo '<script> alert("Incorrect Password"); </script>';
		unset($_SESSION['Fail']);
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
        <div class="row">
        	<div class="twelve columns">    	
                <div id="top-slot">
                    <div class="row">
                        <div class="twelve columns">
                            <div class="html-widget top clearfix">
                                <p>&nbsp;</p>
                            </div>            
                        </div>
                    </div>
                    <div class="row">
                        <div class="twelve columns">
                            <div class="carousel-widget top clearfix">
                                <div class="slideshow-wrapper" data-mouseleave="" data-mouseenter="" data-timeout="3000" data-effect="fade">
                                    <div class="slideshow" style="position: relative; width: 974px; height: 338px;"> 	
										<?php
											$imgpth = mysql_query("Select * FROM slider");
											if(mysql_num_rows($imgpth) > 0)
											{
												while($imgr = mysql_fetch_array($imgpth))
												{
													echo '<div class="slideshow-item" pager-text="'.$imgr["Code"].'">';
													echo '	<div class="banner-widget top clearfix">';
													echo '		<a target="" title="'.$imgr["Code"].'" href="#">';
													echo '			<img alt="'.$imgr["Code"].'" src="'.$imgr["ImagePath"].'"></img>';
													echo '		</a>';
													echo '	</div>';
													echo '</div>';
												}
											}
										?>
                                     </div> <!-- Slide Show Picture -->
                                     <div class="slideshow-pager">
                                     </div> <!-- Slide Show Name -->
                                </div>
                            </div> <!--carousel -->
                        </div>
                    </div>
                </div><!-- top Slot -->
				<div class="clearfix">
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
                        <div class="product-list-widget content clearfix">
                            <div class="row">
                                <div class="twelve columns">
                                    <h3 class="list-title "> Best Buys </h3>
                                    <ul>
										<?php
											$besbuy = mysql_query("Select md.ImagePath,md.Model,md.Price FROM bestbuy as bb , mobiledesc as md WHERE (md.MobCode = bb.Code)");

											if(mysql_num_rows($besbuy) > 0)
											{
												while($row = mysql_fetch_array($besbuy))
												{
													echo '<li>';
													echo '	<div class="variant-wraper">';
													echo '		<div class="variant-image">';
													echo '			<a href="PhoneInfo.php?Phone='.$row["Model"].'"> <img class="butt" title="'.$row["Model"].'" alt="'.$row["Model"].'" src="'.$row["ImagePath"].'" /></a>';	
													echo '		</div>'; 
													echo '		<div class="variant-desc">';
													echo '			<span class="variant-title">';
													echo '			<a href="PhoneInfo.php"> '.$row["Model"].' </a>';
													echo '			</span>';
													echo '			<span class="price">';
													echo '				<span class="variant-final-price">';
													echo '					P'.$row["Price"];
													echo '				</span>';
													echo '			</span>';
													echo '			<span class="buy-now">';
														 if(isset($_SESSION['login']) && $_SESSION['login'] == "ADMIN")
														{
															echo '<a href="PhoneUpdate.php?Update='.$row["Model"].'"> <input type="button" value="Update" /> </a>';
														}
														else if(isset($_SESSION['login']) && $_SESSION['login'] == "USER")
														{
															echo '<a href="PhoneInfo.php?Phone='.$row["Model"].'"> <input type="button" value="buy now!" /> </a>';
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
                        </div> <!-- Best buy -->
                        <div class="product-list-widget content clearfix">
                            <div class="row">
                                <div class="twelve columns">
                                    <h3 class="list-title"> New Release </h3>
                                    <ul>
										<?php
											$besbuy = mysql_query("Select md.ImagePath,md.Model,md.Price FROM newrel as nr , mobiledesc as md WHERE (nr.code = md.MobCode)");

											if(mysql_num_rows($besbuy) > 0)
											{
												while($row = mysql_fetch_array($besbuy))
												{
													echo '<li>';
													echo '	<div class="variant-wraper">';
													echo '		<div class="variant-image">';
													echo '			<a href="PhoneInfo.php?Phone='.$row["Model"].'"> <img class="butt" title="'.$row["Model"].'"  alt="'.$row["Model"].'" src="'.$row["ImagePath"].'" /></a>';	
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
														 if(isset($_SESSION['login']) && $_SESSION['login'] == "ADMIN")
														{
															echo '<a href="PhoneUpdate.php?Update='.$row["Model"].'"> <input type="button" value="Update" /> </a>';
														}
														else if(isset($_SESSION['login']) && $_SESSION['login'] == "USER")
														{
															echo '<a href="PhoneInfo.php?Phone='.$row["Model"].'"> <input type="button" value="buy now!" /> </a>';
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
                        </div> <!-- New Release -->
                        <div class="product-list-widget content clearfix">
                            <div class="row">
                                <div class="twelve columns">
                                    <h3 class="list-title"> Hot Phones! </h3>
                                    <ul>
                                        <?php
											$besbuy = mysql_query("Select md.ImagePath,md.Model,md.Price FROM hotphone as hp , mobiledesc as md WHERE (hp.code = md.MobCode)");

											if(mysql_num_rows($besbuy) > 0)
											{
												while($row = mysql_fetch_array($besbuy))
												{
													echo '<li>';
													echo '	<div class="variant-wraper">';
													echo '		<div class="variant-image">';
													echo '			<a href="PhoneInfo.php?Phone='.$row["Model"].'"> <img class="" title="'.$row["Model"].'"  alt="'.$row["Model"].'" src="'.$row["ImagePath"].'" /></a>';	
													echo '		</div>'; 
													echo '		<div class="variant-desc">';
													echo '			<span class="variant-title">';
													echo '			<a href="PhoneInfo.php"> '.$row["Model"].' </a>';
													echo '			</span>';
													echo '			<span class="price">';
													echo '				<span class="variant-final-price">';
													echo '					P'.$row["Price"];
													echo '				</span>';
													echo '			</span>';
													echo '			<span class="buy-now">';
														 if(isset($_SESSION['login']) && $_SESSION['login'] == "ADMIN")
														{
															echo '<a href="PhoneUpdate.php?Update='.$row["Model"].'"> <input type="button" value="Update" /> </a>';
														}
														else if(isset($_SESSION['login']) && $_SESSION['login'] == "USER")
														{
															echo '<a href="PhoneInfo.php?Phone='.$row["Model"].'"> <input type="button" value="buy now!" /> </a>';
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
                        </div> <!-- Best buy -->
                        <div class="product-list-widget content clearfix">
                            <div class="row">
                                <div class="twelve columns">
                                    <h3 class="list-title"> Accesories </h3>
                                    <ul>
                                        <?php
											
											$besbuy = mysql_query("Select acc.ImagePath,acc.Model,acc.Price FROM accessdesc as acc");

											if(mysql_num_rows($besbuy) > 0)
											{
												while($row = mysql_fetch_array($besbuy))
												{
													echo '<li>';
													echo '	<div class="variant-wraper">';
													echo '		<div class="variant-image">';
													echo '			<a href="PhoneInfo.php?Phone='.$row["Model"].'"> <img class="" title="'.$row["Model"].'" alt="'.$row["Model"].'" src="'.$row["ImagePath"].'" /></a>';	
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
																		 if(isset($_SESSION['login']) && $_SESSION['login'] == "ADMIN")
																		{
																			echo '<a href="PhoneUpdate.php?Update='.$row["Model"].'"> <input type="button" value="Update" /> </a>';
																		}
																		else if(isset($_SESSION['login']) && $_SESSION['login'] == "USER")
																		{
																			echo '<a href="PhoneInfo.php?Phone='.$row["Model"].'"> <input type="button" value="buy now!" /> </a>';
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
                        </div>	<!-- Accesories -->
                    </div> <!-- Content Slot -->
                </div> 
    		</div>
        </div>                 		
	</div> <!--bd-->
    <?php include("php/Footer.php") ?>

</div> <!-- Page -->
</body>
</html>