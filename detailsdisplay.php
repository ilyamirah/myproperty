<?
	include('connection.php');
	$iconid = $_GET['icon_id'];
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
<link href="css/style.css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MyProperty</title>
<SCRIPT TYPE="text/javascript">
<!--
function popup(mylink, windowname)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
window.open(href, windowname, 'width=500,height=235,scrollbars=yes');
return false;
}
//-->
</SCRIPT>
<style>
#overlay_form{
position: absolute;
border: 5px solid gray;
padding: 10px;
background: white;
width: 270px;
height: 190px;
}
#pop{
display: block;
border: 1px solid gray;
width: 65px;
text-align: center;
padding: 6px;
border-radius: 5px;
text-decoration: none;
margin: 0 auto;
}
</style>
</head>
<div id="wrapper">
	<div id="header"><img src="image/header.jpg" height="150" align="middle"/>
    </div><!--header-->
    <div id="log">
    	
        <p><strong><a id="home" href="index.php">MyProperty</a></strong> || <a href="report.php">Report</a></p>
        
    </div><!--log-->
    <div id="mainbody">
    <fieldset>
    	<legend><a href="detailsinputedit.php?icon_id=<? echo $row['icon_id']; ?>&prop_id=<? echo $row['prop_id']; ?>"><img src="image/editbtn.jpg" width="102" height="28" align="middle"/></a></legend>
    <div id="content">
        	<div id="icon_img">
            	<img border="none" src="image/<? echo $row2['icon_img']; ?>" width="100" height="100" />
            </div><!--icon_img-->
            <div id="property_details">
            	<h3><? echo $row2['icon_type']; ?> : <? echo $row['prop_name']; ?></h3>
                <h3>------------------------------</h3>
                <p><strong>Property Address</strong>: <em><? echo $row['prop_address']; ?></em></p>
                <p><strong>Capital Cost</strong>: RM <em><? echo $row['cost']; ?></em></p>
                <p><strong>Date of Purchase</strong>: <em><? echo $row['rent_income_date']; ?></em></p>
                <p><strong>Note</strong>: <em><? echo $row['note']; ?></em></p>
                <p><strong>Leaseholder</strong>: <a href="profile.php?icon_id=<? echo $row2['icon_id']; ?>&prop_id=<? echo $row['prop_id']; ?>">Profile</a></p>
                <p><strong>Expenses</strong>: <a href="outform.php?prop_id=<? echo $row['prop_id']; ?>" onclick="return popup(this, 'Details')">Details</a></p>
                         
                <p><strong>Income</strong>: <a href="inform.php?prop_id=<? echo $row['prop_id']; ?>" onclick="return popup(this, 'Details')">Details</a></p>
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