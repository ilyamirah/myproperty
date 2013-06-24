<?
	include('connection.php');
	$iconid = $_GET['icon_id'];
	//$sql = "select * from icon";
	$propid = $_GET['prop_id'];
	$sql = "select * from property where prop_id='".$propid."'";
	
	$sql2 = "select * from icon where icon_id='".$iconid."'";

	$rslt = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rslt );
	
	$rslt2 = mysql_query($sql2) or die(mysql_error());
	$row2 = mysql_fetch_assoc($rslt2 );
	
	
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
            	<img border="none" src="image/<? echo $row2['icon_img']; ?>" width="100" height="100" align="middle"/>
            </div><!--icon_img-->
            <div id="property_details">
            	<form method="post" action="detailsinputedit_process.php?prop_id=<? echo $row['prop_id']; ?>">
        	<table width="400" border="0">
            <tr>
                <td><h3><? echo $row2['icon_type']; ?> : <? echo $row['prop_name']; ?></h3></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			
              <tr>
                <td>Name</td>
                <td>:</td>
                <td><input type="text" name="name" value="<? echo $row['prop_name']; ?>"/></td>
              </tr>
              <tr>
                <td>Property Address</td>
                <td>:</td>
                <td><input type="text" name="propadd" value="<? echo $row['prop_address']; ?>" /></td>
              </tr>
              <tr>
                <td>Capital Cost</td>
                <td>: RM</td>
                <td><input type="text" name="cost" value="<? echo $row['cost']; ?>" /></td>
              </tr>
              <tr>
                <td>Date of Purchase</td>
                <td>:</td>
                <td><input id="demo1" type="text" name="rentdate" value="<? echo $row['rent_income_date']; ?>"/></td>
                <td><a href="javascript:NewCal('demo1','ddmmyyyy')"><img src="DateFunction/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
              </tr>
              <tr>
                <td>Note</td>
                <td>:</td>
                <td><input type="text" name="note" value="<? echo $row['note']; ?>"/></td>
              </tr>
              <tr>
                <td><input type="hidden" name="iconids" value="<? echo $row['icon_id']; ?>" readonly/></td>
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