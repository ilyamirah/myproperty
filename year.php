<?
include('connection.php');

$query = "SELECT distinct (year(date)) as tmonth FROM keluar";

//$month = mysql_real_escape_string($_POST['mm']);

$result = mysql_query($query) or die(mysql_error());
//$row = mysql_fetch_assoc($result );

//list($year,$month,$day)=explode("-", $row['date']);


?>

<select name="month">

<?
while ($row = mysql_fetch_array($result)){

$monthdb = date("m" , strtotime($row['date']));?>

     
<option value="<?php echo $row['tmonth'];?>"><?php echo $row['tmonth'];?></option>
<?}?>
</select>