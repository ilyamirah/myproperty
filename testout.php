<?
	include('connection.php');
	$propid = $_GET['prop_id'];
	$month = date_format(date_create(),"m");
	$sql = "select * from keluar where prop_id='".$propid."' order by date desc";
	$rslt = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rslt );
	$monthdb = date("m" , strtotime($row['date']));
	
	$sql2 =  "select * from property where prop_id='".$propid."'";
	$rslt2 = mysql_query($sql2) or die(mysql_error());
	$row2 = mysql_fetch_assoc($rslt2 );
?>
<script type='text/javascript'>
function winclose()
{
	window.close();
	}
</script>

<? if ($monthdb == $month) { 

echo "Sorry your expenses for this month already key in. If you want to edit, click Edit"; ?>
<form method="post" action="editout.php?prop_id=<? echo $row2['prop_id']; ?>">
<table width="400" border="0">
              <tr>
                <td>Loan Payment Cost <?=$monthdb;?></td>
                <td>:</td>
                <td><input type="text" name="loanpay" value="<? echo $row['Loan_payment']; ?>" readonly/></td>
              </tr>
              <tr>
                <td>Maintenance Cost</td>
                <td>:</td>
                <td><input type="text" name="maincost" value="<? echo $row['maintenance_cost']; ?>" readonly/></td>
              </tr>
              <tr>
                <td>Date</td>
                <td>:</td>
                <td><input type="text" name="txtDateOut" id="txtDateOut" value="<?php echo date_format(date_create(),"Y-m-d"); ?>" readonly/></td>
              </tr>
              <tr>
                <td><input type="text" name="propid" value="<? echo $row2['prop_id']; ?>" /></td>
                <td>&nbsp;</td>
                <td><a href="editout.php?prop_id=<? echo $row2['prop_id']; ?>">Edit</a></td>
              </tr>
            </table></form>
 <? }
else
{ 

echo "You do not have enter the details for this month yet. Please fill the form"; ?>
<form method="post" action="testout_process.php?prop_id=<? echo $row2['prop_id']; ?>">
<table width="400" border="0">
              <tr>
                <td>Loan Payment Cost <?=$monthdb;?></td>
                <td>:</td>
                <td><input type="text" name="loanpay" /></td>
              </tr>
              <tr>
                <td>Maintenance Cost</td>
                <td>:</td>
                <td><input type="text" name="maincost"/></td>
              </tr>
              <tr>
                <td>Date</td>
                <td>:</td>
                <td><input type="text" name="txtDateOut" id="txtDateOut" value="<?php echo date_format(date_create(),"Y-m-d"); ?>" readonly/></td>
              </tr>
              <tr>
                <td><input type="text" name="propid" value="<? echo $row2['prop_id']; ?>" /></td>
                <td>&nbsp;</td>
                <td><input type="submit" name="btnSave" value="Save" onclick="return winclose()"/></td>
              </tr>
            </table>
<? } ?>
</form>