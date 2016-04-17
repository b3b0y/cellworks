<?php
$dbhost = 'localhost';
$dbuser= 'root';
$dbpass = '';
$dbname = 'cellworks';

$conn = mysql_connect($dbhost,$dbuser,$dbpass);

mysql_select_db($dbname);
?>