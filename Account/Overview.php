<?php

	$result = mysql_query("SELECT * FROM login WHERE username='".$_SESSION['user']."'");
	
	$row = mysql_fetch_array($result);
	
	echo '<h2>Welcome ' .$row['LastName']. '</h2>
		  <br>
		  <p> <b>Email: </b> <span>'.$row["Email"].'</span> </p>
		  <p> <b>Contact: </b> <span>'.$row["Contact"].'</span></p>
		  <p> <b>Address: </b> <span>'.$row["Address"].'</span></p>
		  <br> </br>
		  <dl>
			<dt>As a registered member you can now enjoy the following benefits: </dt>
			<dd>
				<ol>
					<li><b>Express Checkout</b> - Sign in and proceed to checkout for quick ordering. </li>
					<li><b>My Order History</b>  - Review the details of your Order history and status.</li>
					<li><b>Exclusive offers and Fests </b> - participate in exciting promos and festivals and win fabulous deals. </li>
				</ol>
			</dd>
		  </dl>
		  
		  ';


?>