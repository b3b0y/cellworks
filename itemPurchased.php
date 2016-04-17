<?php
	echo '<style type="text/css">
	table
	{
		width: 100%;
	}
	table th, table thead td {
    background-color: grey;
    color: white;
    height: 3em;
	text-align: center;
	}
	caption, th, td {
		font-weight: normal;
		text-align: center;
	}
	table, td, th {
		vertical-align: middle;
	}
	th, td, caption {
		
	}
	</style>';
	
	$result = mysql_query("SELECT * FROM itempurchased");
	
	if(mysql_num_rows($result) > 0)
	{
	?>
			<p>&nbsp </p>
			 <table>
				<thead>
					<tr>
						<th> Customer </th>
						<th> Reference number </th>
						<th> Mobile Code</th>
						<th> Price </th>
						<th> Date </th>
						<th> Status	</th>
						<th colspan="2"> Action	</th>
					</tr>
				</thead>
				<tbody>
	<?php
		while($row = mysql_fetch_array($result))
		{
	?>
			<tr>
			   <td class="reff">
			    	<div><?php echo $row['cUser']; ?></div>
			   </td>
			   <td class="item">
			    	<div><?php echo $row['ReffNum']; ?></div>
			    </td>
			    <td class="date">
			    	<div><?php echo $row['MobCode']; ?></div>
			    </td>
			     <td class="tot">
			     	<div><?php echo $row['Price']; ?></div>
			     </td>
			     <td class="stats">
			     	<div><?php echo $row['DatePurch']; ?></div>
			     </td>
			     <td class="date">
			     	<div><?php echo $row['Status']; ?></div>
			     </td>
			 	<td id='td'> <a href='#?userid=<?php echo $row['cUser'];; ?>'> <img src='Images/logo/edit.png' alt='Edit Users Details' /></a></td>
				<td id='td'> <a href="JavaScript:if(confirm('Are you sure you want to Delete?')==true){window.location='index.php?username=<?=$row['cUser']; ?>';}"> <img src='Images/logo/delete.png' alt='Delete User' /></a></td>
			 </tr>
	<?php
		}

	?>
				<tr> 
					<td colspan="10"> <hr> </td>
				</tr>
				</tbody>
			</table>
	
	<?php	
	}
	else
	{	
			echo '<p>&nbsp</p>';
			echo '<span>You dont have any Orders.</span><p>&nbsp</p>';
	}

	
?>