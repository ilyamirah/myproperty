<?
include('connection.php');
$iconid = $_POST['iconids'];
$name = $_POST['name'];
$propadd = $_POST['propadd'];
$capcost = $_POST['cost'];
$rentindate = $_POST['rentdate'];
$note = $_POST['note'];
 


	$sql = "insert into property(prop_name,cost,rent_income_date,prop_address,note,icon_id)
			values('$name','$capcost','$rentindate','$propadd','$note','$iconid')";	
	$rslt = mysql_query($sql) or die(mysql_error());
	header('location:detailsinput_success.php');
	


?>