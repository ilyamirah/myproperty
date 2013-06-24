<?
	include('connection.php');
	$lid = $_GET['L_id'];	
	$propid = $_GET['prop_id'];

	$sql = "select * from leaseholder where prop_id='".$propid."'";

	$rslt = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rslt );
	
	$iconid = $_GET['icon_id'];
	$sql2 = "select * from icon where icon_id='".$iconid."'";
	$rslt2 = mysql_query($sql2) or die(mysql_error());
	$row2 = mysql_fetch_assoc($rslt2 );
	
	$propid = $_GET['prop_id'];
	$sql3 = "select * from property where prop_id='".$propid."'";
	$rslt3 = mysql_query($sql3) or die(mysql_error());
	$row3 = mysql_fetch_assoc($rslt3 );
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/style.css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MyProperty</title>
</head>
<div id="wrapper">
	<div id="header"><img src="image/header.jpg" height="150" align="middle"/>
    </div><!--header-->
    <div id="log">
    	
        <p><strong><a id="home" href="index.php">MyProperty</a></strong> || <a href="report.php">Report</a></p>
        
    </div><!--log-->
    <div id="mainbody">
    
    <fieldset>
    	<legend><a href="profileedit.php?L_id=<? echo $row['L_id']; ?>&prop_id=<? echo $row3['prop_id']; ?>"><img src="image/editbtn.jpg" width="102" height="28" align="middle"/></a></legend>
    <div id="content">
        	<div id="icon_img">
            	<img border="1" src="image/dp.jpg" width="100" height="100" />
            </div><!--icon_img-->
            <div id="property_details">
            	<h3>Leaseholder Profile</h3>
                <p class="propertyaddress"><? echo $row2['icon_type']; ?> : <? echo $row3['prop_name']; ?></p>
		<p><strong>Name</strong>: <? echo $row['L_name']; ?></p>	
                <p><strong>Address</strong>: <? echo $row['L_address']; ?></p>
                <p><strong>Contact No.</strong>:<? echo $row['L_contactno']; ?></p>
                <p><strong>Email</strong>: <? echo $row['L_email']; ?></p>
                <p><strong>Occupation</strong>: <? echo $row['L_occupation']; ?></p>
                
                <br />
            </div><!--book_details-->
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