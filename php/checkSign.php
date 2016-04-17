<?
session_start();
include_once("config.php");

if (!isset($_POST['Lname']) || trim($_POST['Lname']) == "")
{
	$_SESSION['Ln'] = "Last Name Can't be blank  <br>";
	$stop==1;
}
else
{
	$Lname = mysql_escape_string(trim($_POST['Lname']));
	unset($_SESSION['Ln']);
	$stop==0;
}

if (!isset($_POST['Fname']) || trim($_POST['Fname']) == "")
{
	$_SESSION['Ln'] = "First Name Can't be blank  <br>";
	$stop==1;
}
else
{
	$Fname = mysql_escape_string(trim($_POST['Fname']));
	unset($_SESSION['Fn']);
	$stop==0;
}

if (!isset($_POST['Mi']) || trim($_POST['Mi']) == "") 
{
	$_SESSION['Mi'] = "Middle Initial Can't be blank  <br>";
	$stop==1;
}
else
{
	$Mi = mysql_escape_string(trim($_POST['Mi']));
	unset($_SESSION['Mi']);
	$stop==0;
}

if(!isset($_POST['Address']) || trim($_POST['Address']) == "") 
{
	$_SESSION['add'] = "Address Can't be blank  <br>"; 
	$stop==1;
}
else
{
	$add = mysql_escape_string(trim($_POST['Address']));
	unset($_SESSION['add']);
	$stop==0;
}

if(ctype_alpha($_POST['Cnum']))
{
	$_SESSION['cnum'] = "Contact must be numbers  <br>";
	$stop==1;
}
else
{
	$cnum = mysql_escape_string(trim($_POST['Cnum']));
	unset($_SESSION['cnum']);
	$stop==0;
}

if(!isset($_POST['email']) || trim($_POST['email']) >= 6)
{ 
	$_SESSION['email'] = "Email must have at least 6 characters  <br>";
	$stop==1;
}
else if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST['email']))
{
	$_SESSION['email'] = "Invalid email format <br>";
	$stop==1;
}
else
{
	$email = mysql_escape_string(trim($_POST['email']));
	unset($_SESSION['emial']);
	$stop==0;
}

if(!isset($_POST['uname2']) || trim($_POST['uname2']) == "")
{
	$_SESSION['uname'] = "User Name must have at least 6 characters  <br>";
	$stop==1;
}
else
{
	$uname = mysql_escape_string(trim($_POST['uname2']));
	unset($_SESSION['uname']);
	$stop==0;
}


if(!isset($_POST['pass2']) || trim($_POST['pass2']) >= 6) 
{
	 $_SESSION['pass'] = "Password must have at least 6 characters <br>";
	 $stop==1;
}
else
{
	$pswd = mysql_escape_string(trim($_POST['pass2']));
	unset($_SESSION['pass']);
	$stop==0;
}


if(!isset($_POST['cpass']) || trim($_POST['cpass']) == "")
{
	$_SESSION['cpass'] = "Confirm Password must have at least 6 characters  <br>";
	header('Location: ../SignUp.php');
	$stop==1;
}
else
{
	$cpswd = mysql_escape_string(trim($_POST['cpass']));
	unset($_SESSION['cpass']);
	$stop==0;
}	
if(!isset($_POST['uLevel']) || trim($_POST['uLevel']) == "")
{
	$_SESSION['uLevel'] = "User Level Invalid  <br>";
	header('Location: ../SignUp.php');
	$stop==1;
}
else
{
	$ulevel = mysql_escape_string(trim($_POST['uLevel']));
	unset($_SESSION['uLevel']);
	$stop==0;
}	
	
	if ($stop==0) 
	{
		if($cpswd == $pswd)
		{
			$sql = "SELECT UserName,Email FROM Login";
			
			$qry = mysql_query($sql) or die("Query : " . mysql_error());
			
			while ($row = mysql_fetch_array($qry)) 
			{
				if ($uname == $row['UserName']) 
				{
					$_SESSION['uname'] = "Username <font color='#FF0000'> &quot;$uname&quot; </font> was already use by someone else, <br>";
					$stop = 1;
					header('Location: ../SignUp.php');
					break;
				}
				else if ($email == $row['Email']) 
				{
					$_SESSION['email'] = "Emaill address <font color='#FF0000'> &quot;$email&quot; </font>  was already use by someone else, <br>";
					$stop = 1; 
					header('Location: ../SignUp.php');
					break;
				}
			}
			if ($stop==0) 
			{
				$sql = "INSERT INTO Login (UserName,Password,LastName,FirstName,Mi,address,Contact,Email,user_level) VALUES ('$uname','$pswd','$Lname','$Fname','$Mi','$add','$cnum','$email','$ulevel')";
				$qry = mysql_query($sql) or die("Query  : "  . mysql_error());
				unset($_SESSION['email']); 
				unset($_SESSION['uname']); 
				$_SESSION['succ'] = "<font color='#00FF00'> <b>Successfully Registered </b> </font>";
				header('Location: ../SignUp.php	');
			}
		}
		else
		{
			$_SESSION['cpass'] = "Password doesn't match confirmation  <br>";
			header('Location: ../SignUp.php');
			$stop = 1;
		}	
	}
		
	
?>

