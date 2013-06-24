
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/style.css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MyProperty</title>
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
</head>
<div id="wrapper">
	<div id="header"><img src="image/header.jpg" height="150" align="middle"/>
    </div><!--header-->
    <div id="log">
    	
        <p><strong><a id="home" href="index.php">MyProperty</a></strong> || <a href="report.php">Report</a></p>
        
    </div><!--log-->
    <div id="mainbody">
    <form name="frmMain" action="delete_process.php" method="post" OnSubmit="return onDelete();"> 
    <?  
$objConnect = mysql_connect("localhost","root","") or die(mysql_error());  
$objDB = mysql_select_db("myproperty");  
$strSQL = "SELECT * FROM property p, icon i WHERE p.icon_id=i.icon_id";  
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]"); 


?>  
    <fieldset>
    	<legend><strong>Select property to delete <input type="submit" name="btnDelete" value="Delete"></strong></legend>
        <div id="content" align="center">
        	<div id="propertylist">
            <?  
while($objResult = mysql_fetch_array($objQuery))  
{  
?> 
            	
            	<div class="property">
                
                	<img border="none" width="150" height="150" src="image/<? echo $objResult['icon_img']; ?>"  />
                	<p class="propertytitle"><? echo $objResult['prop_name']; ?></p>
                    <p class="propertyaddress"><? echo $objResult['prop_address']; ?></p>
                    <p><a href="detailsdisplay.php?icon_id=<? echo $objResult['icon_id']; ?>&prop_id=<? echo $objResult['prop_id']; ?>">More+..</a></p>
                    
                    <input type="checkbox" name="chkDel[]" value="<?=$objResult["prop_id"];?>">
                </div><!--property-->
                <? } ?>
            </div><!--propertylist-->
        </div><!--content-->
    </fieldset>
    </form>
    <?  
mysql_close($objConnect);  
?> 
     </div><!--mainbody-->
    <div id="footer">
    <p><strong>©2013 MyProperty</strong></p>
    </div><!--footer-->
</div><!--wrapper-->
<body>
</body>
</html>