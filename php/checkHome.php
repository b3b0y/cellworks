<?php
	session_start();
	include_once("config.php");
	
	$slide = mysql_escape_string($_POST['slide']); /* <-- Picture name */

	
	if(isset($_POST['submitS']))
	{
		if(!isset($_POST['slideop']) || trim($_POST['slideop']) == "")
		{
			$_SESSION['sop'] = "Please Select Image Column number";
			header('Location: ../UpdateHome.php');
			break;
		}
		else
		{
			if(!isset($_POST['slide']) || trim($_POST['slide']) == "")
			{
				$_SESSION['sop'] = "Please Select Image from your computer";
				header('Location: ../UpdateHome.php');
				break;
			}
			else
			{
				$slideop = mysql_escape_string($_POST['slideop']);
				$pager = mysql_escape_string($_POST['pager']);
				unset($_SESSION['sop']);
				
				$query = "UPDATE homeimg SET ImagePath='Images/Cellphones/Slide/".$slide."',Code='".$pager."' WHERE ID='".$slideop."'";

				mysql_query($query) or die ('error in query');	
				$_SESSION['sop'] = "Update Successfully";
			}
		}
	}
	
	if(isset($_POST['submitB']))
	{
		if(!isset($_POST['bestop']) || trim($_POST['bestop']) == "")
		{
			$_SESSION['bop'] = "Please Select Image Column number";
			header('Location:  ../UpdateHome.php');
			break;
		}
		else
		{
			
				$bestop = mysql_escape_string($_POST['bestop']);
				$modb = mysql_escape_string($_POST['modb']);
				unset($_SESSION['bop']);
				
				$query = "UPDATE homeimg SET Code='".$modb."' WHERE ID='".$bestop."'";
				mysql_query($query) or die ('error in query');	
				$_SESSION['bop'] = "Update Successfully";
			}
		}
	}
	
	if(isset($_POST['submitN']))
	{
		if(!isset($_POST['newop']) || trim($_POST['newop']) == "")
		{
			$_SESSION['nop'] = "Please Select Image Column number";
			header('Location:  ../UpdateHome.php');
			break;
		}
		else
		{

				$newop = mysql_escape_string($_POST['newop']);
				$modn = mysql_escape_string($_POST['modn']);
				unset($_SESSION['nop']);
				
				$query = "UPDATE homeimg SET Code='".$modn."' WHERE ID='".$newop."'";
				mysql_query($query) or die ('error in query');	
				$_SESSION['nop'] = "Update Successfully";
		}
	}
	
	if(isset($_POST['submitH']))
	{
		if(!isset($_POST['hotop']) || trim($_POST['hotop']) == "")
		{
			$_SESSION['hop'] = "Please Select Hot Image from your computer";
			header('Location:  ../UpdateHome.php');
			break;
		}
		else
		{
	
				$hotop = mysql_escape_string($_POST['hotop']);
				$modh = mysql_escape_string($_POST['modh']);
				unset($_SESSION['hop']);
				
				$query = "UPDATE homeimg SET Code='".$modh."' WHERE ID='".$hotop."'";
				mysql_query($query) or die ('error in query');	
				$_SESSION['hop'] = "Update Successfully";

		}
	}
	
	if(isset($_POST['submitA']))
	{
		if(!isset($_POST['Acceop']) || trim($_POST['Acceop']) == "")
		{
			$_SESSION['aop'] = "Please Select Accesories Image from your computer";
			header('Location:  ../UpdateHome.php');
			break;
		}
		else
		{

				$Acceop = mysql_escape_string($_POST['Acceop']);
				$moda = mysql_escape_string($_POST['moda']);
				unset($_SESSION['aop']);
				
				$query = "UPDATE homeimg SET Code='".$moda."' WHERE ID='".$Acceop."'";
				mysql_query($query) or die ('error in query');	
				$_SESSION['aop'] = "Update Successfully";
			
		}
	}
	header('Location: ../UpdateHome.php');
	mysql_close($conn);
?>