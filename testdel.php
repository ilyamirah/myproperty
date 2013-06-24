<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<script language="JavaScript">  
function onDelete()  
{  
if(confirm('Do you want to delete ?')==true)  
{  
return true;  
}  
else  
{  
return false;  
}  
}  
</script> 

<form name="frmMain" action="test.php" method="post" OnSubmit="return onDelete();">  
<?  
$objConnect = mysql_connect("localhost","root","") or die(mysql_error());  
$objDB = mysql_select_db("myproperty");  
$strSQL = "SELECT * FROM property";  
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");  
?>  
<table width="600" border="1">  
<tr>  
<th width="91"> <div align="center">PropertyID </div></th>  
<th width="98"> <div align="center">Name </div></th>  
<th width="198"> <div align="center">Address </div></th>   
<th width="30"> <div align="center">Delete </div></th>  
</tr>  
<?  
while($objResult = mysql_fetch_array($objQuery))  
{  
?>  
<tr>  
<td><div align="center"><?=$objResult["prop_id"];?></div></td>  
<td><?=$objResult["prop_name"];?></td>  
<td><?=$objResult["prop_address"];?></td>  
<td align="center"><input type="checkbox" name="chkDel[]" value="<?=$objResult["prop_id"];?>"></td>  
</tr>  
<?  
}  
?>  
</table>  
<?  
mysql_close($objConnect);  
?>  
<input type="submit" name="btnDelete" value="Delete">  
</form>  
</body>
</html>