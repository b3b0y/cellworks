<?php
session_start();
	include_once("php/config.php");
	
	if(!isset($_SESSION['login'])) 
	{
            header("Location: index.php");
	} 
	
	$_SESSION['add'] = "Update";
	
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
		$logio = '<li> <a href="php/Logout.php"> Logout </a> </li> <li> | </li>';
		$setting = ' <li> <a class="sett" > Dashboard </a> </li>';
		$view = '<a href="ViewAll.php"> <input type="button" value="VIEW ALL"> </a>';
		$cancel = '<a href="PhoneInfo.php?Phone='.$_GET['Update'].'"> <input type="button" value="CANCEL"></a>';
		$head = '<li> | </li>
		<li><a href="myAccount.php"> My Account </a></li>';
	}
	else if($_SESSION['login'] == "CASHIER")
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
<title><?php echo $_SESSION['alt']; ?></title>

<link rel="stylesheet" href="CSS/Cellworks.css" type="text/css" />
<link rel="stylesheet" href="CSS/CellworksNav.css" type="text/css" />
<script src="Javascript/jqueryinst.js" type="text/javascript"></script>
<script type="text/javascript" src="Javascript/jQuery v1.7.js"></script>
<script type="text/javascript" src="Javascript/Cellworks.js"></script>
<script src="Javascript/basic.js" type="text/javascript"></script>
</head>

<body>
<div id="page">

	<?php 
		include("php/Header.php");  /*-- HD --*/
?><?php 
		
		$mobile = "SELECT m.*,s.* FROM mobiledesc as m, supplier as s WHERE m.supID=s.supID and  Model='".$_GET['Update']."'";
									
		$result =  mysql_query($mobile) or die("Connection failed : " . mysql_error());
		
		$num = mysql_num_rows($result);
		
		if($num == 0)
		{
			$tablet = "SELECT * FROM tabletdesc WHERE Model='".$_GET['Update']."'";
			
			$result =  mysql_query($tablet) or die("Connection failed : " . mysql_error());
			
			$row = mysql_fetch_array($result);
		}
		else
		{
			$row = mysql_fetch_array($result);
		}
	?>
    <div id="bd" class="clearfix"> 
	<form name="pupdate" method="post" action="php/checkPhne.php">
		<div id="product-detail-page">
			<div id="top-slot">
				<div class=" row">
					<div class=" twelve columns">
						<p> &nbsp </p>
						<p> <?php echo isset($_SESSION['msg']); ?> </p>
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
											<a > <img src="<?php echo $row['ImagePath']; ?>"></img> </a>
											<p> <input type="file" name="PicName" required><font  color="Red" size="5px"> * </font>  </p>
										</li>
									</ul> 
								</div><!-- Image -->
							</div>
							<div class="three columns">
								<div id="catalog-header">
									<div id="catalog-title">
										<div id="title">
											<h1 class="like-h2" ><?php echo $row['Model']; ?></h1>
										</div>
										<div id="catalog-details">
											<div class="our_price" style="color:#F90;font-weight:bold;font-size:20px">
												<label> Our Price:</label>
													<span>Php<input name="Price" size="15" type="text" value="<?php echo $row["Price"]; ?>" style="border:1px solid #999;padding:5px;color:#F90;font-weight:bold;font-size:18px;"></span>
												<font  color="Red" size="5px"> * </font> 
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="one columns">
									<?php echo $view; ?>
									<?php echo $cancel; ?>
									<input type="submit" name="save" value="SAVE"> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class=" row">
				<div class=" twelve columns">
					<div id="description" class="clearfix">
					<label> Add Supplier:</label>
					<select name="supp" required>
						<option value="<?php echo $row['supID'] ?>" selected='selected' > <?php echo $row['supName'] ?>
						<option value="">Please select </option>
						<?php
							$result = mysql_query("SELECT * FROM supplier order by supName ASC");
							while($sup = mysql_fetch_array($result))
							{
								echo '<option value="' .$sup["supID"]. '" >' .$sup["supName"]. '</option>';
							}
						?>
					</select>
						<h3 class="section-header">Description</h3>
								<p><strong>Key Features of <?php  echo $row['Model']; ?> </strong></p>
								<p><textarea id="CommentBox" style="width:900px; height:auto;" name="Desc"><?php echo $row['Description']; ?></textarea></p>
					</div>
					<div id="feature_groups">
						<h3 class="section-header">Features</h3>
						<h4> GENERAL FEATURES </h4>
						<table border="0" cellspacing="1" cellpadding="4" width="100%">
							<tbody>                              
								<tr>
									<td class="feature_name" width="150">Brand</td>
									<td> 
										<select name="brand" required>
											<option value="<?php echo $row['Brand'] ?>" selected='selected' > <?php echo $row['Brand'] ?>
											<option value="">Please select</option>
											<?php
												$result = mysql_query("SELECT * FROM BRANDS");
												while($brand = mysql_fetch_array($result))
												{
													echo '<option value="' .$brand["Brands"]. '" >' .$brand["Brands"]. '</option>';
												}
											?>
										</select>
										<font  color="Red" size="5px"> * </font> 
									</td>
								</tr>
								<tr>
									<td class="feature_name" width="150">Model</td>
									<td><input name="Model" type="text"  size="140" value="<?php echo $row['Model'] ?>" required> <font  color="Red" size="5px"> * </font> </td>
									
								</tr>
								<tr>
									<td class="feature_name" width="150">Processor</td>
									<td><input name="Proces" type="text" size="140"  value="<?php echo $row['Processor'] ?>"></td>                              
								</tr>
								<tr>
									<td class="feature_name" width="150">Operating System</td>
									<td><input name="OS" type="text" size="140"  value="<?php echo $row['OS'] ?>"></td>
								</tr>
								<tr>
									<td class="feature_name" width="150">Ram</td>
									<td><input name="RAM" type="text" size="140"  value="<?php echo $row['RAM'] ?>"></td>
								</tr>
								<tr>
									<td class="feature_name" width="150">Internal memory</td>
									<td><input name="INtM" type="text" size="140"  value="<?php echo $row['Internalm'] ?>"></td>
								</tr>
								<tr>
									<td class="feature_name" width="150">Display screen</td>
									<td><input name="Discre" type="text" size="140"  value="<?php echo $row['Discre'] ?>"></td>
								</tr>
								<tr>
									<td class="feature_name" width="150">Resolution pixels</td>
									<td><input name="Respix" type="text" size="140"  value="<?php echo $row['Respix'] ?>"></td>
								</tr>
								<tr>
									<td class="feature_name" width="150">Battery capacity</td>
									<td><input name="Battcap" type="text" size="140"  value="<?php echo $row['Battcap'] ?>"></td>
								</tr>
								<tr>
									<td class="feature_name" width="150">Other features</td>
									<td><textarea id="CommentBox" style="width:890px; height:auto;" name="OtherFt"><?php echo $row['OtherFeat'] ?></textarea></td>
								</tr>
								<tr>
									<td class="feature_name" width="150">Mobile Code</td>
									<td><input name="MobCode" type="text" size="140"  value="<?php echo $row['MobCode'] ?>"  required>
									<font  color="Red" size="5px"> * </font> 
									(Mobile code must be entered)
									</td>
								</tr>
								<tr>
									<td class="feature_name" width="150">Shipping Days</td>
									<td>
										<select name="ship" required> 
											<option value="">
											<option value="1">1
											<option value="2">2
											<option value="3">3
											<option value="4">4
											<option value="5">5
											<option value="6">6
											<option value="7">7
										</select>
										<font  color="Red" size="5px"> * </font> 
										</td>
								</tr>
								<tr>
									<td class="feature_name" width="150">Type</td>
									<td>
									<select name="type" required> 
										<option value="<?php echo $row['Type'] ?>" selected='selected' > <?php echo $row['Type'] ?>
										<option value="Mobile">Mobile
										<option value="Tablet">Tablet
										<option value="Accesories">Accesories
									</select>
									<font  color="Red" size="5px"> * </font> 
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</form>
	</div> <!-- bd -->
	<?php include("php/Footer.php") ?>
	
</div>
</body>
</html>