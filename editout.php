<link href="css/style.css" rel="stylesheet" />

<?
	include('connection.php');
	$propid = $_GET['prop_id'];
	
	$sql = "select * from keluar where prop_id='".$propid."' order by date desc";
	$rslt = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rslt );
	
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


<script language="javascript" type="text/javascript" src="DateFunction/datetimepicker.js">

</script>

<form method="post" action="testout_process.php">

<table width="400" border="0">
			  <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
               <td>&nbsp;</td>
              </tr>
              <tr class="odd">
                <td>Loan Payment Cost</td>
                <td>: RM</td>
                <td><input type="text" name="loanpay" value="<? echo $row['Loan_payment']; ?>"/></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Maintenance Cost</td>
                <td>: RM</td>
                <td><input type="text" name="maincost" value="<? echo $row['maintenance_cost']; ?>"/></td>
              </tr>
              <tr class="odd">
                <td>Date</td>
                <td>:</td>
                <td><input id="demo1" type="text" name="txtDateOut" value="<? echo $row['date']; ?>"/></td>
                <td><a href="javascript:NewCal('demo1','ddmmyyyy')"><img src="DateFunction/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
              </tr>
              <tr>
                <td><input type="hidden" name="propid" value="<? echo $row2['prop_id']; ?>" /></td>
                <td>&nbsp;</td>
                <td><input type="submit" name="btnSaveEdit" value="Save" onclick="return winclose()"/></td>
              </tr>
            </table>

</form>