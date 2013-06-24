<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?  


$objConnect = mysql_connect("localhost","root","") or die(mysql_error());  
$objDB = mysql_select_db("myproperty");  
  
for($i=0;$i<count($_POST["chkDel"]);$i++)  
{  
if($_POST["chkDel"][$i] != "")  
{  
$strSQL = "DELETE FROM property ";  
$strSQL .="WHERE prop_id = '".$_POST["chkDel"][$i]."' ";  
$strSQL2 ="DELETE FROM keluar ";  
$strSQL2 .="WHERE prop_id = '".$_POST["chkDel"][$i]."' ";
$objQuery = mysql_query($strSQL); 
$objQuery2 = mysql_query($strSQL2);
}  
}  
  
echo "Record Deleted.";  
  
mysql_close($objConnect);  
?> 
</body>
</html>