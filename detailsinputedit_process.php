<?
include('connection.php');
$propid = $_GET['prop_id'];
$iconid = $_POST['iconids'];
$name = $_POST['name'];
$propadd = $_POST['propadd'];
$capcost = $_POST['cost'];
$rentindate = $_POST['rentdate'];
$note = $_POST['note'];
 


	$sql = "update property
			set prop_name='$name',cost='$capcost',rent_income_date='$rentindate',prop_address='$propadd',note='$note' where prop_id='$propid'";	
	$rslt = mysql_query($sql) or die(mysql_error());
	header('location:index.php');

?>