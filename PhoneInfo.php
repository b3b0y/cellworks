<?php
session_start();
	include_once("php/config.php");
		$logio = '';
		$update = '';
		$setting = '';
		$view = '';
		$add = '';
		$Delete = '';
		$head = '';
		$buynow = '';
		$soldout = '';
		$update = '';
		
	if(isset($_SESSION['login']) && $_SESSION['login'] == "USER")
	{
		$logio = '<li> <a href="php/Logout.php"> Logout </a> </li>';
		$buynow = '<input  type="submit" value="Add to Cart" name="add_cart"></input>';
		$soldout = '<h2 style="color:red;">Not Available</h2>';
		$head = '<li> | </li>
		<li><a href="myAccount.php"> My Account </a></li> 
		<li> | </li>
		<li><a class="shopping-cart" href="ShoppingCart.php"> Shopping Cart </a></li>';
	}
	else if(isset($_SESSION['login']) && $_SESSION['login'] == "ADMIN")
	{
		$logio = ' <li> <a href="php/Logout.php"> Logout </a> </li> <li> | </li>';
		$update = '<a href="PhoneUpdate.php?Update='.isset($_GET['Phone']).'"> <input style=""  type="button" value="UPDATE"></input> </a>';
		$setting = ' <li> <a class="sett" > Dashboard </a> </li>';
		$view = '<a href="PhoneMaintenance.php?ViewAll=ViewAll""> <input type="button" value="VIEW ALL"> </a>';
		$add = '<a href="PhoneMaintenance.php?Addphone=Addp"> <input style=""  type="button" value="ADD"></input> </a>';
		$Delete = '<a onclick="check();"> <input  type="button" value="DELETE"></input> </a>';
		$head = '<li> | </li>
		<li><a href="myAccount.php"> My Account </a></li>';
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




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nokia Lumia</title>

<link rel="stylesheet" href="CSS/Cellworks.css" type="text/css" />
<link rel="stylesheet" href="CSS/CellworksNav.css" type="text/css" />
<script src="Javascript/jqueryinst.js" type="text/javascript"></script>
<script type="text/javascript" src="Javascript/jQuery v1.7.js"></script>
<script type="text/javascript" src="Javascript/Cellworks.js"></script>
<script src="Javascript/basic.js" type="text/javascript"></script>

<script language="javascript">
function check() {
    var delvar = "<?php echo $_GET['Phone'] ?>";
    var answer = confirm("Are you sure you want to delete the article?")
    if (answer) {
        window.location = "php/PhneDel.php?Model=" + delvar;
    }
}
</script>

</head>

<body>
<div id="page">

	<?php include_once("php/Header.php"); /*-- HD --*/
	
		$mobile = "SELECT * FROM mobiledesc WHERE Model='".$_GET['Phone']."'";
									
		$result =  mysql_query($mobile) or die("Connection failed : " . mysql_error());
		
		$num = mysql_num_rows($result);
		
		if($num == 0)
		{
			$tablet = "SELECT * FROM tabletdesc WHERE Model='".$_GET['Phone']."'";
			
			$result =  mysql_query($tablet) or die("Connection failed : " . mysql_error());
			
			$row = mysql_fetch_array($result);
		}
		else
		{
			$row = mysql_fetch_array($result);
		}
	?>
	<div id="bd" class="clearfix"> 
	
		<div id="product-detail-page">
			<div id="top-slot">
				<div class=" row">
					<div class=" twelve columns">
						<p> &nbsp </p>
						<p> <a href="index.php">Home</a> &gt; <a href="">Mobiles</a> &gt; <a href="">Nokia</a> </p>
					</div>
				</div>
				<div class=" row">
					<div class="twelve columns">
						<div class=" row">
							<div class="five columns">
								<div id="images" >
									<ul class="thumbnails" >
										<li>
											<a > <img src="<?php $_SESSION['ImgPath']=$row["ImagePath"];  echo $row["ImagePath"]; ?>"></img> </a>
											
										</li>
									</ul> 
								</div><!-- Image -->
							</div>
							<div class="three columns">
								<div id="catalog-header">
									<div id="catalog-title">
										<div id="title">
											<h1 class="like-h2" ><?php $_SESSION['mod']=$row["Model"]; echo $row["Model"]; ?></h1>
										</div>
										<div id="catalog-details">
											<div class="our_price" style="color:#F90;font-weight:bold;font-size:20px">
												<label> Our Price:</label>
												<span>Php<?php $_SESSION['price']=$row["Price"]; echo $row["Price"]; ?></span>
											</div>
												<form method="post" action="php/checkCart.php">
												
												<br></br>
												<?php
												
												$result = mysql_query("SELECT DISTINCT i.* FROM inventory AS i, mobiledesc AS m 
														   WHERE (m.MobCode = i.MobCode) AND i.MobCode='".$row['MobCode']."' AND i.PQty > 0");
												if(mysql_num_rows($result) > 0)
												{
													echo $buynow;
												}
												else
												{
													echo $soldout;
												}
												
												echo $update;
												?>
												</form>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="one columns">
									<?php echo $view; ?>
									<?php echo $add; ?>
									<?php echo $Delete; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class=" row">
				<div class=" twelve columns">
					<div id="description" class="clearfix">
						<h3 class="section-header">Description</h3>
						<?php
							echo '<p><strong>Key Features of '. $row["Model"]. '</strong></p>';
						
							echo '<p>' .$row["Description"]. '</p>';
						?>
					</div>
					<div id="feature_groups">
						<h3 class="section-header">Features</h3>
						<h4> GENERAL FEATURES </h4>
						<table border="0" cellspacing="1" cellpadding="4" width="100%">
							<tbody>                              
								<?php

											echo '<tr>';
												echo '<td class="feature_name" width="150">Brand</td>';
												echo '<td>' .$row["Brand"]. '</td>';   
											echo '</tr>';
											echo '<tr>';
												echo '<td class="feature_name" width="150">Model</td>';
												echo '<td>'.$row["Model"].'</td>';
											echo '</tr>';
											echo '<tr>';
												echo '<td class="feature_name" width="150">Processor</td>';
												echo '<td>' .$row["Processor"]. '</td>';                                
											echo '</tr>';
											echo '<tr>';
												echo '<td class="feature_name" width="150">Operating System</td>';
												echo '<td>'.$row["OS"].'</td>';
											echo '</tr>';
											echo '<tr>';
												echo '<td class="feature_name" width="150">Ram</td>';
												echo '<td>'.$row["RAM"].'</td>';
											echo '</tr>';
											echo '<tr>';
												echo '<td class="feature_name" width="150">Internal memory</td>';
												echo '<td>'.$row["Internalm"] .'</td>';
											echo '</tr>';
											echo '<tr>';
												echo '<td class="feature_name" width="150">Display screen</td>';
												echo '<td>'.$row["Discre"].'</td>';
											echo '</tr>';
											echo '<tr>';
												echo '<td class="feature_name" width="150">Resolution pixels</td>';
												echo '<td>'.$row["Respix"].'</td>';
											echo '</tr>';
											echo '<tr>';
												echo '<td class="feature_name" width="150">Battery capacity</td>';
												echo '<td>'.$row["Battcap"].'</td>';
											echo '</tr>';
											echo '<tr>';
												echo '<td class="feature_name" width="150">Other features</td>';
												echo '<td>'.$row["OtherFeat"].'</td>';
											echo '</tr>';
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- bd -->
	<?php
	include_once("php/Footer.php") 
	?> 

</div>
</body>
</html>
