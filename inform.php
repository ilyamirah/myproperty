<link href="css/style.css" rel="stylesheet" />

<?
	include('connection.php');
	$propid = $_GET['prop_id'];
	$month = date_format(date_create(),"m");
	$sql = "select * from masuk where prop_id='".$propid."' order by date desc";
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

<? if ($monthdb == $month) { ?>

<form method="post" action="editin.php?prop_id=<? echo $row2['prop_id']; ?>">
<table width="400" border="0">
			  <tr>
                <strong>Sorry your income details for this month already key in. If you want to edit, click Edit</strong>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr class="odd">
                <td>Rental Price</td>
                <td>: RM</td>
                <td><? echo $row['Rent_Price']; ?></td>
              </tr>
              <tr>
                <td>Date</td>
                <td>:</td>
                <td><?php echo $row['date']; ?></td>
              </tr>
              <tr class="odd">
                <td><input type="hidden" name="propid" value="<? echo $row2['prop_id']; ?>" /></td>
                <td>&nbsp;</td>
                <td><a href="editin.php?prop_id=<? echo $row2['prop_id']; ?>">Edit</a></td>
              </tr>
            </table></form>
 <? }
else
{ ?>
<form method="post" action="inform_process.php?prop_id=<? echo $row2['prop_id']; ?>">
<table width="400" border="0">
			  <tr>
                <strong>You did not have enter the income details for this month yet. Please fill the form</strong>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr class="odd">
                <td>Rental Price</td>
                <td>: RM</td>
                <td><input type="text" name="rentcost" /></td>
              </tr>
              <tr>
                <td>Date</td>
                <td>:</td>
                <td><input type="text" name="txtDateIn" value="<?php echo date_format(date_create(),"Y-m-d"); ?>" readonly/></td>
              </tr>
              <tr class="odd">
                <td><input type="hidden" name="propid" value="<? echo $row2['prop_id']; ?>" /></td>
                <td>&nbsp;</td>
                <td><input type="submit" name="btnSaveIn" value="Save" onclick="return winclose()"/></td>
              </tr>
            </table>
<? } ?>
</form>