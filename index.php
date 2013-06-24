<?
	include('connection.php');
	//$sql = "select p.prop_name, p.prop_address, i.icon_img from property p, icon i where p.icon_id=i.icon_id";
	$sql = "select * from property p, icon i where p.icon_id=i.icon_id";
	$rslt = mysql_query($sql) or die(mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/style.css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Property</title>

</head>

<div id="wrapper">
	<div id="header"><img src="image/header.jpg" height="150" align="middle"/>
    </div><!--header-->
    <div id="log">
    	
        <p><strong><a id="home" href="index.php">MyProperty</a></strong> || <a href="report.php">Report</a></p>
        
    </div><!--log-->
    <div id="mainbody">
    <fieldset>
    	<legend><a href="icon.php"><img src="image/addbtn.jpg" width="102" height="28" align="middle"/></a><a href="delete.php"><img src="image/deletebtn.jpg" width="102" height="28" align="middle"/></a></legend>
        <div id="content" align="center">
        	<div id="propertylist">
            	<? while($row = mysql_fetch_assoc($rslt)){?>
            	<div class="property">
                	<img border="none" width="150" height="150" src="image/<? echo $row['icon_img']; ?>"  />
                	<p class="propertytitle"><? echo $row['prop_name']; ?></p>
                    <p class="propertyaddress"><? echo $row['prop_address']; ?></p>
                    <p><a href="detailsdisplay.php?icon_id=<? echo $row['icon_id']; ?>&prop_id=<? echo $row['prop_id']; ?>">More+..</a></p>
                </div><!--property-->
                <? } ?>
            </div><!--propertylist-->
        </div><!--content-->
    </fieldset>
    </div><!--mainbody-->
    <div id="footer">
    <p><strong>©2013 MyProperty</strong></p>
    </div><!--footer-->
</div><!--wrapper-->
<body>
</body>
</html>