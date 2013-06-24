<?
$host = "localhost";
$user = "root";
$password = "";
$db = "myproperty";

$conn = mysql_connect($host,$user,$password) or die(mysql_error());
$select_db = mysql_select_db($db) or die(mysql_error());
?>