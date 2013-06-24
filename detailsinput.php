<?
	include('connection.php');
	$iconid = $_GET['icon_id'];
	$sql = "select * from icon where icon_id='".$iconid."'";
	$rslt = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rslt );
	
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
     <fieldset>
    	<legend><strong>New Property</strong>: <? echo $row['icon_type']; ?></legend>
    <div id="content">
        	<div id="icon_img">
            	<img border="none" src="image/<? echo $row['icon_img']; ?>" width="100" height="100" align="middle"/>
            </div><!--icon_img-->
            <div id="property_details">
            	<form method="post" action="detailsinput_process.php">
        	<table width="350" border="0">
            
               <tr>
                <td><strong>Property Details</strong></td>
                <td></td>
                <td></td>
                
                
              </tr>
              <tr>
                <td>Name</td>
                <td>:</td>
                <td><input type="text" name="name" /></td>
                
                
              </tr>
              <tr>
                <td>Property Address</td>
                <td>:</td>
                <td><input type="text" name="propadd" /></td>
                
                
              </tr>
              <tr>
                <td>Capital Cost</td>
                <td>: RM</td>
                <td><input type="text" name="cost" /></td>
                
               
              </tr>
              <tr>
                <td>Date of Purchase</td>
                <td>:</td>
                <td><input id="demo1" type="text" name="rentdate" /></td>
                <td><a href="javascript:NewCal('demo1','ddmmyyyy')"><img src="DateFunction/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
               
                 
              </tr>
              <tr>
                <td>Note</td>
                <td>:</td>
                <td><input type="text" name="note" /></td>
             
                
              </tr>
               <tr>
                <td><input type="hidden" name="iconids" value="<? echo $row['icon_id']; ?>" /></td>
                <td>&nbsp;</td>
                <td><input type="submit" value="Save Now" /></td>
                
               
              </tr>
              
            </table>
            </form>
            </div><!--property_details-->
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