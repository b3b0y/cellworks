<?php
	echo '<style type="text/css">
	table
	{
		
		width: 64em;
	}
	table th, table thead td {
    background-color: grey;
    color: white;
    height: 3em;
	text-align: center;
	}
	caption, th, td {
		text-align: left;
		font-weight: normal;
	}
	table, td, th {
		vertical-align: middle;
	}
	th, td, caption {
		
	}
	</style>';
	
	$result = mysql_query("SELECT * FROM phon_imei");
	
	if(mysql_num_rows($result) > 0)
	{
	?>
			<p>&nbsp </p>
			 <table>
				<thead>
					<tr>
						<th> Mobile Code</th>
						<th> IMEI </th>
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
			    	<div><?php echo $row['MobCode']; ?></div>
			   </td>
			   <td class="item">
			    	<div><?php echo $row['IMEI']; ?></div>
			    </td>
			    <td class="date">
			    	<div><?php echo $row['status']; ?></div>
			    </td>
			 	<td id='td'> <a href='#'> <img src='Images/logo/edit.png' alt='Edit Users Details' /></a></td>
				<td id='td'> <a href="JavaScript:if(confirm('Are you sure you want to Delete?')==true){window.location='#?username=<?=$row['IMEI'];; ?>';}"> <img src='Images/logo/delete.png' alt='Delete User' /></a></td>
			 </tr>
	<?php
		}

	?>
				<tr> 
					<td colspan="5"> <hr> </td>
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