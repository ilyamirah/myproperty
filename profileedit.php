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

<script language="javascript" type="text/javascript" src="DateFunction/datetimepicker.js">

</script>

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
    <div id="content">
        	<div id="icon_img">
            	<!--<img border="none" src="image/<? echo $row['icon_img']; ?>" width="100" height="100" align="middle"/>-->
            </div><!--icon_img-->
            <div id="property_details">
            	<form method="post" action="profileedit_process.php?prop_id=<? echo $row3['prop_id']; ?> &l_id=<? echo $row['L_id']; ?>">
        	<table width="400" border="0">
            <tr>
                <td><p class="propertyaddress"><? echo $row2['icon_type']; ?> : <? echo $row3['prop_name']; ?></p></td>
              </tr>
              <tr>
                <td>Name</td>
                <td>:</td>
                <td><input type="text" name="name" value="<? echo $row['L_name']; ?>"/></td>
              </tr>
              <tr>
                <td>Address</td>
                <td>:</td>
                <td><input type="text" name="Address" value="<? echo $row['L_address']; ?>" /></td>
              </tr>
              <tr>
                <td>Contact No:</td>
                <td>:</td>
                <td><input type="text" name="ContactNo" value="<? echo $row['L_contactno']; ?>" /></td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="text" name="Email" value="<? echo $row['L_email']; ?>"/></td>
              </tr>
              <tr>
                <td>Occupation</td>
                <td>:</td>
                <td><input type="text" name="Occupation" value="<? echo $row['L_occupation']; ?>"/></td>
              </tr>
             
              <tr>
                <td><input type="hidden" name="iconids" value="<? echo $row['L_id']; ?>" readonly/></td>
                <td>&nbsp;</td>
                <td><input type="submit" value="Save Now" /></td>
              </tr>
            </table>
            </form>
            </div><!--property_details-->
        </div><!--content-->
    </div><!--mainbody-->
    <div id="footer">
    <p><strong>©2013 MyProperty</strong></p>
    </div><!--footer-->
</div><!--wrapper-->
<body>
</body>
</html>