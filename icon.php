<?
	include('connection.php');
	$sql = "select * from icon";
	$rslt = mysql_query($sql) or die(mysql_error());
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
    	<legend><strong>Choose Icon</strong></legend>
        <div id="content" align="center">
        	<div id="iconlist">
            	<? while($row = mysql_fetch_assoc($rslt)){?>
            	<div class="icon">
                	<img border="none" width="100" height="100" src="image/<? echo $row['icon_img']; ?>"  />
                    <p class="propertytitle"><? echo $row['icon_type']; ?></p>
                    <p class="propertytitle">---------------</p>
                    <p><a id="choose" href="detailsinput.php?icon_id=<? echo $row['icon_id']; ?>" >Choose</a></p>
                </div><!--icon-->
                <? } ?>
            </div><!--iconlist-->
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