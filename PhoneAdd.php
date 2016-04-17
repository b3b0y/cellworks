<div id="bd" class="clearfix"> 
<form name="pupdate" method="post" action="php/checkPhne.php">
	<div id="product-detail-page">
		<div id="top-slot">
			<div class=" row">
				<div class=" twelve columns">
					<p> &nbsp </p>
				</div>
			</div>
			<div class=" row">
				<div class="twelve columns">
					<div class=" row">
						<div class="five columns">
							<div id="images" >
								<ul class="thumbnails" >								
									<li>
										<p>Select Image: <input type="file" name="PicName" required> <font  color="Red" size="5px"> * </font>  </p>
									</li>
								</ul> 
							</div><!-- Image -->
						</div>
						<div class="three columns">	
							<div id="catalog-header">
								<div id="catalog-title">
									<div id="title">
										<h1 class="like-h2" ></h1>
									</div>
									<div id="catalog-details">
										<div class="our_price" style="color:#F90;font-weight:bold;font-size:20px">
											<label> Price:</label>
												<span>Php<input name="Price" size="15" type="text" value="" style="border:1px solid #999;padding:5px;color:#F90;font-weight:bold;font-size:18px;" required><font  color="Red" size="5px"> * </font></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="one columns">		
								<?php 
								
								echo $cancel; 
								?>
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
							<p><strong>Key Features </strong></p>
							<p><textarea id="CommentBox" style="width:900px; height:auto;" name="Desc"></textarea></p>
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
											<option value="">Please select </option>
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
									<td><input name="Model" type="text"  size="140" value="" required> <font  color="Red" size="5px"> * </font> </td>
									
								</tr>
								<tr>
									<td class="feature_name" width="150">Processor</td>
									<td><input name="Proces" type="text" size="140"  value=""></td>                              
								</tr>
								<tr>
									<td class="feature_name" width="150">Operating System</td>
									<td><input name="OS" type="text" size="140"  value=""></td>
								</tr>
								<tr>
									<td class="feature_name" width="150">Ram</td>
									<td><input name="RAM" type="text" size="140"  value=""></td>
								</tr>
								<tr>
									<td class="feature_name" width="150">Internal memory</td>
									<td><input name="INtM" type="text" size="140"  value=""></td>
								</tr>
								<tr>
									<td class="feature_name" width="150">Display screen</td>
									<td><input name="Discre" type="text" size="140"  value=""></td>
								</tr>
								<tr>
									<td class="feature_name" width="150">Resolution pixels</td>
									<td><input name="Respix" type="text" size="140"  value=""></td>
								</tr>
								<tr>
									<td class="feature_name" width="150">Battery capacity</td>
									<td><input name="Battcap" type="text" size="140"  value=""></td>
								</tr>
								<tr>
									<td class="feature_name" width="150">Other features</td>
									<td><textarea id="CommentBox" style="width:890px; height:auto;" name="OtherFt"></textarea></td>
								</tr>
								<tr>
									<td class="feature_name" width="150">Mobile Code </td>
									<td><input name="MobCode" type="text" size="140"  value=""  required><font  color="Red" size="5px"> * </font> 
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
										<option value="">
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
