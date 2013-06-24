<?  


$objConnect = mysql_connect("localhost","root","") or die(mysql_error());  
$objDB = mysql_select_db("myproperty");  
  
for($i=0;$i<count($_POST["chkDel"]);$i++)  
{  
if($_POST["chkDel"][$i] != "")  
{  
$strSQL = "DELETE FROM property ";  
$strSQL .="WHERE prop_id = '".$_POST["chkDel"][$i]."' "; 
$objQuery = mysql_query($strSQL); 

$strSQL2 ="DELETE FROM keluar ";  
$strSQL2 .="WHERE prop_id = '".$_POST["chkDel"][$i]."' ";
$objQuery2 = mysql_query($strSQL2);

$strSQL3 ="DELETE FROM masuk ";  
$strSQL3 .="WHERE prop_id = '".$_POST["chkDel"][$i]."' ";
$objQuery3 = mysql_query($strSQL3);

$strSQL4 ="DELETE FROM leaseholder ";  
$strSQL4 .="WHERE prop_id = '".$_POST["chkDel"][$i]."' ";
$objQuery4 = mysql_query($strSQL4);
}  
}  
  
header('location:index.php'); 
  
mysql_close($objConnect);  
?> 