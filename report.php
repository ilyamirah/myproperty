<? 

include('connection.php');

$month = $_GET['month'];
$year = $_GET['year'];

if (!isset($month))
{
$out = "SELECT k.Loan_payment, k.maintenance_cost, p.prop_name, p.prop_address, p.icon_id, i.icon_img, m.Rent_Price
FROM Keluar k
INNER JOIN property p ON k.Prop_id = p.prop_id
INNER JOIN Masuk m ON k.Prop_id = m.Prop_id
INNER JOIN icon i ON p.icon_id = i.icon_id";
}
else
{
$out = "SELECT k.Loan_payment, k.maintenance_cost, p.prop_name, p.prop_address, p.icon_id, i.icon_img, m.Rent_Price, m.date AS datem, k.date AS datek
FROM Keluar k
INNER JOIN property p ON k.Prop_id = p.prop_id
INNER JOIN Masuk m ON k.Prop_id = m.Prop_id
INNER JOIN icon i ON p.icon_id = i.icon_id
WHERE YEAR( m.date ) = '".$year."'
AND MONTH( m.date ) = '".$month."'";
}

//$sql = "select * from property p, icon i where p.icon_id=i.icon_id";
//$rslt = mysql_query($sql) or die(mysql_error());

//$out = "select (maintenance + tax + loan_payment) as totalout from property p, icon i where p.icon_id=i.icon_id";

//$out = "select (Loan_payment+maintenance_cost) as total from Out, icon i, property p where p.icon_id=i.icon_id";
$rsltout = mysql_query($out) or die(mysql_error());
//$rowout = mysql_fetch_assoc($rsltout );

//$in = "select rent_income as totalin from property p, icon i where p.icon_id=i.icon_id";
//$rsltin = mysql_query($in) or die(mysql_error());
//$rowin = mysql_fetch_assoc($rsltin );

//$profit = "select (maintenance + tax + loan_payment) - rent_income as profit from property p, icon i where p.icon_id=i.icon_id";
//$rsltprofit = mysql_query($profit) or die(mysql_error());
//$rowprofit = mysql_fetch_assoc($rsltprofit);
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
    <form method="post" action="reportproses.php">
                <legend><strong>Your Properties Summary:-</strong></legend>


                <?
$query = "SELECT distinct (month(date)) as month FROM keluar";

//$month = mysql_real_escape_string($_POST['mm']);

$result = mysql_query($query) or die(mysql_error());
//$row = mysql_fetch_assoc($result );

//list($year,$month,$day)=explode("-", $row['date']);


?>

<select name="month">

<?
while ($row = mysql_fetch_array($result)){

$monthdb = date("m" , strtotime($row['date']));?>

<option value="<?php echo $row['month'];?>"><?php echo $row['month'];?></option>
<? } ?>
</select>
                    <?
include('connection.php');

$query = "SELECT distinct (year(date)) as year FROM keluar";

//$month = mysql_real_escape_string($_POST['mm']);

$result = mysql_query($query) or die(mysql_error());
//$row = mysql_fetch_assoc($result );

//list($year,$month,$day)=explode("-", $row['date']);


?>

<select name="year">

<?
while ($row = mysql_fetch_array($result)){

$monthdb = date("m" , strtotime($row['date']));?>

     
<option value="<?php echo $row['year'];?>"><?php echo $row['year'];?></option>
<?}?>
</select>
                    <input type="submit" value="Display" />
                    <input name="Print" type="button" value="Print" />
                	<table width="500" border="1">                    
                      <tr>
                        <th>Properties</th>
                        <th>Out</th>
                        <th>In</th>
                        <th>Profit</th>
                      </tr>
                      <tr>
                      <? while($rowout = mysql_fetch_assoc($rsltout)){
	                  $total = $rowout['Loan_payment']+$rowout['maintenance_cost'];
	                  $profit = $rowout['Rent_Price']-$total;
                      ?>
                        <td align="right"><img border="none" width="100" height="100" src="image/<? echo $rowout['icon_img']; ?>"  />
                        <div id="property_details_report">
                        <p class="propertytitlereport"><? echo $rowout['prop_name']; ?></p>
                    	<p class="propertyaddressreport"><? echo $rowout['prop_address']; ?></p>
                        </div><!--property_details--></td>
                        <td align="center"><? echo $total; ?></a>
                        </td>
                        <td align="center"><? echo $rowout['Rent_Price']; ?></td>
                        <td align="center"><? echo $profit; ?></td>
                      </tr>
               			<? 
               			$profit_total+=$profit;
               			}?>
               			<tr>
               			<td>TOTAL PROFIT</td>
               			<td></td>
               			<td></td>
               			<td><? echo $profit_total; ?></td>
               			</tr>
                    </table>
                </fieldset>
    </div><!--mainbody-->
    <div id="footer">
    <p><strong>©2013 MyProperty</strong></p>
    </div><!--footer-->
</div><!--wrapper-->
<body>
</body>
</html>