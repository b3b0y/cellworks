<?
session_start();
include_once("config.php");

if (!isset($_POST['Sname']) || trim($_POST['Sname']) == "")
{
	$_SESSION['Sn'] = "Supplier Name Can't be blank  <br>";
	$stop==1;
}
else
{
	$Sname = mysql_escape_string(trim($_POST['Sname']));
	unset($_SESSION['Sn']);
	$stop==0;
}

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
	
		
				$sql = "INSERT INTO Supplier (supName, ownlName, ownfName, ownMI, supAddress, supContact, supEmail) VALUES ('$Sname','$Lname','$Fname','$Mi','$add','$cnum','$email')";
				$qry = mysql_query($sql) or die("Query  : "  . mysql_error());
				unset($_SESSION['email']); 
	
				echo "<script> 
					alert('SUCCESSFULLY ADDED'); 
					window.location.href='../SupplyMaintenance.php?Account=Acct';
			   </script>";
			
		
	
?>
