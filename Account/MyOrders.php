<?php
	$total = '';

	echo '<style type="text/css">
	table
	{
		width: 64em;
	}
	table th, table thead td {
    background-color: grey;
    color: white;
    height: 3em;
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
	
	$result = mysql_query("SELECT * FROM mobiledesc AS md ,itempurchased AS ip WHERE (md.MobCode = ip.MobCode) AND ip.cUser='".$_SESSION['user']."'");
	
	if(mysql_num_rows($result) > 0)
	{
	?>
			<p>&nbsp </p>
			 <table>
				<thead>
					<tr>
						<th> Reference number </th>
						<th> Product Title </th>
						<th> Ships in </th>
						<th> Price </th>
						<th> Net Amount	</th>
						<th> Status	</th>
						<th> Date	</th>
					</tr>
				</thead>
				<tbody>
	<?php
		while($row = mysql_fetch_array($result))
		{
			echo '<tr>';
			echo '   <td class="reff">';
			echo '    	<div>'.$row['ReffNum'].'</div>';
			echo '    </td>';
			echo '   <td class="item">';
			echo '    	<div>'.$row['Model'].'</div>';
			echo '    </td>';
			echo '    <td class="date">';
			echo '    	<div>'.$row['sDay'].'</div>';
			echo '    </td>';
			echo '    <td class="Price">';
			echo '    	<div>Php'.$row['Price'].'</div>';
			echo '    </td>';
			echo '    <td class="tot">';
			echo '    	<div>Php'.$row['Price'].'</div>';
			echo '    </td>';
			echo '    <td class="stats">';
			echo '    	<div>'.$row['Status'].'</div>';
			echo '    </td>';
			echo '    <td class="date">';
			echo '    	<div>'.$row['DatePurch'].'</div>';
			echo '    </td>';
			echo '</tr>';
			$total = $total + $row['Price'];
		}
	?>
				<tr> 
					<td colspan="7"> <hr> </td>
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