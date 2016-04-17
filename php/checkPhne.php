<?php
	session_start();
	include_once("config.php");
	
		$imgpth = mysql_escape_string(trim($_POST['PicName']));
		$Brand = mysql_escape_string(trim($_POST['brand']));
		$model = mysql_escape_string(trim($_POST['Model']));
		$proces = mysql_escape_string(trim($_POST['Proces']));
		$os = mysql_escape_string(trim($_POST['OS']));
		$ram = mysql_escape_string(trim($_POST['RAM']));
		$intm = mysql_escape_string(trim($_POST['INtM']));
		$Discre = mysql_escape_string(trim($_POST['Discre']));
		$respix = mysql_escape_string(trim($_POST['Respix']));
		$battcap = mysql_escape_string(trim($_POST['Battcap']));
		$otherft = mysql_escape_string(trim($_POST['OtherFt']));
		$Desc = mysql_escape_string(trim($_POST['Desc']));
		$price = mysql_escape_string(trim($_POST['Price']));
		$mobcode = mysql_escape_string(trim($_POST['MobCode']));
		$shipp = mysql_escape_string(trim($_POST['ship']));
		$type = mysql_escape_string(trim($_POST['type']));
		$supp = mysql_escape_string(trim($_POST['supp']));
		
		
		if($_SESSION['add'] == "ADD") /* if The user want to Add */
		{
				$imagepath = "Images/Cellphones/".$Brand."/".$imgpth.""; /* location of the Image */
				$mob = "INSERT INTO mobiledesc (ImagePath, Brand, Model, Processor, OS, RAM, Internalm, Discre, Respix, Battcap, OtherFeat, Description, Price, MobCode,sDay, Type, supID)
						VALUES('".$imagepath."','".$Brand."','".$model."','".$proces."','".$os."','".$ram."','".$intm."','".$Discre."','".$respix."','".$battcap."','".$otherft."','".$Desc."','".$price."','".$mobcode."','".$shipp."','".$type."','".$supp."')";
			mysql_query($mob) or die ('error in  query' . mysql_error());
			unset($_SESSION['add']);
			echo '<script> alert("Successfully Added") 
					window.location.href="../PhoneInfo.php?Phone='.$model.'";
				  </script>';
		}
		else /* if The user want to Update*/
		{
			$result  = mysql_query("SELECT * FROM mobiledesc WHERE Model='".$model."'"); //update if the type is mobile
			if(mysql_num_rows($result) > 0) 
			{
				$mob = "UPDATE mobiledesc SET ImagePath='Images/Cellphones/".$Brand."/".$imgpth."', Brand='".$Brand."', Model='".$model."', Processor='".$proces."', 
				  OS='".$os."', RAM='".$ram."', Internalm='".$intm."', Discre='".$Discre."', Respix='".$respix."', Battcap='".$battcap."',OtherFeat='".$otherft."',
				  Description='".$Desc."', Price='".$price."', MobCode='".$mobcode."', sDay='".$shipp."', Type='".$type."', supID='".$supp."' WHERE Model='".$model."'";
			}
			else //update if the type is Tablet
			{
				$mob = "UPDATE  tabletdesc SET ImagePath='Images/Cellphones/".$Brand."/".$imgpth."', Brand='".$Brand."', Model='".$model."', Processor='".$proces."', 
				  OS='".$os."', RAM='".$ram."', Internalm='".$intm."', Discre='".$Discre."', Respix='".$respix."', Battcap='".$battcap."',OtherFeat='".$otherft."',
				  Description='".$Desc."', Price='".$price."', MobCode='".$mobcode."', sDay='".$shipp."', Type='".$type."' , supID='".$supp."' WHERE Model='".$model."'";
			}
			mysql_query($mob) or die ('error in  query' . mysql_error());
			unset($_SESSION['add']);
			header('Location: ../PhoneInfo.php?Phone='.$model.'');
		}		
		
		
		mysql_close($conn);

?>