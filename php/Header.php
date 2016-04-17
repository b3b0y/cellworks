 <?php
	include_once("php/config.php");
 ?>
 
 <div id="hd">
        <div class="row">
            <div class=" twelve columns">
               <div class="header-widget header clearfix">
                    <div class="logo-top-links">
                        <div class="logo">  
                            <a title="Cellwors" href="index.php">
                                <img alt="Cellworks" src="Images/logo/Cellworks.jpg" width="466" height="117" />
                            </a>
                        </div>
                        <div class="top-links">
                        	<div class="top-nav">
                        	<ul>
                                <li> <a href="index.php">  Home </a>   </li> 
                                
                                <?php echo $head ?>
                                <li> | </li>
                                <?php 
									echo $logio . $setting; ?>
                          	</ul>
                            </div>
                            <div class="popup"> 
                            	<ul>
                                <form name="form1" class="form1" method="post" action="php/checkpwd.php">	
                                    <li>
                           				<input  style="	border:1px solid #999;padding:5px;" type="text" name="uname" id="uname" size="35" placeholder="Username/Email" required/>
                                   	</li>
                                    <li>
                                    	<input style="	border:1px solid #999;padding:5px;" type="password" name="pass" id="pass" size="35" placeholder="Password" required/>
                              		</li>
                                    <li>
                                    	<input style="width:120px;" name="login" type="submit" value="Login" class="close" />
                                    </li>
                                </form>
                            </div> 
                            <div class="dropset"> 
                         		<ul>
                                																			
									<li> <a href="POS.php"> POS </a> </li>
									<li> <a href="inventory2.php"> INVENTORY </a> 
									<li> <a href="admin.php"> ACCOUNT SETTINGS </a> </li> 
									<li> <a href="PhoneMaintenance.php"> PHONES MAINTENANCE </a> 
									<li> <a href="Purchased.php"> PURCHASED MAINTENANCE </a> </li>
									<li> <a href="SupplyMaintenance.php"> SUPPLIER MAINTENANCE </a> </li>
									<!-- <li> <a href="UpdateHome.php"> Update Homepage </a> </li> -->
									
                                </ul>
                            </div> 	   
								<?php
									$result = mysql_query("SELECT * FROM login where user_level=5");
									$row = mysql_fetch_array($result);
								?>
								
                            <div style="text-align:right; font-size:18px; margin-top:10px;">
                                <span style="color:#FF3300">
                                    Customer Care:
                                </span>

                                <span style="color:#000">
                                    <?php echo $row['Contact'] ?> |
                                    <a style="font-size:18px; margin-left:0px" href="#">
                                       <?php echo $row['Email'] ?> 
                                    </a>
                                </span>
                            </div>
                            <div class="search">
                                <form name="form1" method="post" action="searchs.php">
                                    <input id="search-input" class="text" type="text"  placeholder="Search here" name="search" />
                                    <input class="search-go" type="submit" value="GO" /> 
                                </form>
                            </div>
                        </div>
                        <div class="header-menu navtree">
                            <div class="header-menu navtree">
								<ul class="sf-menu sf-js-enabled sf-shadow">
									<li><a class="menu-level-0 sf-with-ul" href="Mobiles.php?Mobile=Mobile">MOBILES </a>
										<ul class="multi-columns column-24 sf-js-enabled  sf-shadow" style="float: none; width: 27em; display: none; visibility: hidden;">
											<?php
											
													$mobile =  mysql_query("SELECT DISTINCT Brand,Type FROM mobiledesc WHERE Type='Mobile'");
													
													if(mysql_num_rows($mobile) > 0)
													{
														while($row = mysql_fetch_array($mobile))
														{
															echo '<li class="" style="white-space: normal; float: left; width: 100%;">';
															echo '	<a class="menu-level-1" style="float: none; width: auto;" href="Mobiles.php?Brand='.$row["Brand"].'&Type='.$row["Type"].'">'.$row["Brand"].'</a>';
															echo '</li>';
														}
													}
											?>
										</ul>
									</li>
									<li><a class="menu-level-0" href="Mobiles.php?Tablet=Tablet">TABLETS </a>
										<ul class="multi-columns column-24 sf-js-enabled sf-shadow" style="float: none; width: 27em; display: none; visibility: hidden;">
											<?php
											
													$tablet =  mysql_query("SELECT DISTINCT Brand,Type FROM mobiledesc WHERE Type='Tablet'");
													
													if(mysql_num_rows($tablet) > 0)
													{
														while($row = mysql_fetch_array($tablet))
														{
															echo '<li class="" style="white-space: normal; float: left; width: 100%;">';
															echo '	<a class="menu-level-1" style="float: none; width: auto;" href="Mobiles.php?Brand='.$row["Brand"].'&Type='.$row["Type"].'">'.$row["Brand"].'</a>';
															echo '</li>';
														}
													}
											?>
										</ul>
									</li>
									<li><a class="menu-level-0" href="">ACCESSORIES </a>
										<ul class="multi-columns column-24 sf-js-enabled sf-shadow" style="float: none; width: 27em; display: none; visibility: hidden;">
											<li class="" style="white-space: normal; float: left; width: 100%;">
												<a class="menu-level-1" style="float: none; width: auto;" href="#">Charger</a>
											</li>
											<li class="" style="white-space: normal; float: left; width: 100%;">
												<a class="menu-level-1" style="float: none; width: auto;" href="#">Casing</a>
											</li>
											<li class="" style="white-space: normal; float: left; width: 100%;">
												<a class="menu-level-1" style="float: none; width: auto;" href="#">Headphones</a>
											</li>
											<li class="" style="white-space: normal; float: left; width: 100%;">
												<a class="menu-level-1" style="float: none; width: auto;" href="#">Jelly Case</a>
											</li>
											<li class="" style="white-space: normal; float: left; width: 100%;">
												<a class="menu-level-1" style="float: none; width: auto;" href="#">Screen Protector</a>
											</li>
											<li class="" style="white-space: normal; float: left; width: 100%;">
												<a class="menu-level-1" style="float: none; width: auto;" href="#">Pouch</a> 
											</li>
										</ul>
									</li>
									<li><a class="menu-level-0" href="">NEW</a>
										<ul class="multi-columns column-24 sf-js-enabled sf-shadow" style="float: none; width: 27em; display: none; visibility: hidden;">
											<li class="" style="white-space: normal; float: left; width: 100%;">
												<a class="menu-level-1" style="float: none; width: auto;" href="#">Apple Ipad Mini</a>
											</li>
											<li class="" style="white-space: normal; float: left; width: 100%;">
												<a class="menu-level-1" style="float: none; width: auto;" href="#">Apple Ipad Air</a>
											</li>
											<li class="" style="white-space: normal; float: left; width: 100%;">
												<a class="menu-level-1" style="float: none; width: auto;" href="#">Apple Iphone 5S</a>
											</li>
											<li class="" style="white-space: normal; float: left; width: 100%;">
												<a class="menu-level-1" style="float: none; width: auto;" href="#">Apple Iphone 5C</a>
											</li>
											<li class="" style="white-space: normal; float: left; width: 100%;">
												<a class="menu-level-1" style="float: none; width: auto;" href="#">Samsung Galaxy Grand 2</a></li>
											<li class="" style="white-space: normal; float: left; width: 100%;">
												<a class="menu-level-1" style="float: none; width: auto;" href="#">Nokia Lumia 1320</a>
											</li>
										</ul>
									</li>
									<li><a class="menu-level-0" href="">OFFERS</a></li>
									<li><a class="menu-level-0" href="">STORES</a>
										<ul class="multi-columns column-24 sf-js-enabled sf-shadow" style="float: none; width: 27em; display: none; visibility: hidden;">
											<li class="" style="white-space: normal; float: left; width: 100%;">
												<a class="menu-level-1" style="float: none; width: auto;" href="#">Store Branch</a>
											</li>
											<li class="" style="white-space: normal; float: left; width: 100%;">
												<a class="menu-level-1" style="float: none; width: auto;" href="#">Store locator</a>
											</li>
										</ul>
									</li>
									<li><a class="menu-level-0" href="">MORE </a></li>
									<li><a class="menu-level-0" href="">SALE! </a></li>
								</ul>
							</div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div> <!-- HD -->