<div id="bd" class="clearfix">
	<div class="row">
		<div class="twelve columns">	
			<div class="clearfix">
				<div class="row">
					<div class="twelve columns">
						<p> &nbsp; </p>
					</div>
				</div>
				<div class="span-19 last" id="content-slot"> 
					<div id="search-resultsAll">  
						<div class="clearfix">	
						</div>
						<div class="clearfix">            
							<ul id="search-result-items" class="grid-viewAll  clearfix">
								<?php
								
									$mobile = mysql_query("Select ImagePath,Model,Price FROM mobiledesc ORDER BY Model ASC");
									if(mysql_num_rows($mobile) > 0)
									{
										while($row = mysql_fetch_array($mobile))
										{
								?>
											<li class="clearfix">
												<div class="variant-wraper">
													<div class="variant-image">
														<a href="PhoneInfo.php?Phone=<?php echo $row['Model'] ?>" title="<?php echo $row["Model"] ?> "> <img class="butt"  alt="<?php echo $row["Model"] ?>" src="<?php echo $row["ImagePath"] ?>" /></a>
													</div>
													<div class="variant-descAll">
														<span class="variant-titleAll">
															<a href="PhoneInfo.php"> <?php echo $row["Model"] ?> </a>
														</span>
														<span class="contributors">
															<span class="">
																<a></a>
															</span>
														</span>
														<span class="price">
															<span class="variant-final-priceAll">
																P <?php echo $row["Price"]  ?> 
															</span>
														</span>
														<span class="buy-now">
															<a href="PhoneUpdate.php?Update=<?php echo $row["Model"]  ?>"> <input type="submit" value="UPDATE" /> </a> 
															<a href="JavaScript:if(confirm('Are you sure you want to Delete?')==true){window.location='php/PhneDel.php?Model=<?=$row['Model']; ?>';}"> <input type="submit" value="DELETE" /> </a>
														</span>
													</div>
												</div>
											</li>
								<?php
										}
										unset($_SESSION['nt']);
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

