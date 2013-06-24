<?
include('connection.php');
$propid = $_POST['propid'];
$rentalpay = $_POST['rentcost'];
$datein = $_POST['txtDateIn'];

$savein = $_POST["btnSaveIn"];
$edit = $_POST["btnSaveEdit"];
//$sql = "insert into keluar(prop_id, Loan_payment, maintenance_cost, date)
	//		values('$propid','$loanpay','$maincost','$dateout')";	
	//$rslt = mysql_query($sql) or die(mysql_error());
	
	
	//$query ="SELECT * FROM keluar WHERE prop_id='$propid'";
//$testResult = mysql_query($query) or die('Error, query failed');    


if ($savein =='Save')
	{
    //insert...
    $query ="INSERT INTO masuk(Prop_id, Rent_Price, date)
    VALUES ('$propid','$rentalpay','$datein')";
    $result = mysql_query($query) or die('Error, query failed');
}
if ($edit == 'Save')
	{ 
    //update...
    $query = "UPDATE masuk
        SET Prop_id='$propid', Rent_price='$rentalpay', date='$datein'
        WHERE Prop_id='$propid'";
        $result = mysql_query($query) or die('Error, query failed');        
}
	
	
	
	header('location:detailsdisplay.php');

?>