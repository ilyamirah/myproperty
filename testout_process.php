<?
include('connection.php');
$propid = $_POST['propid'];
$loanpay = $_POST['loanpay'];
$maincost = $_POST['maincost'];
$dateout = $_POST['txtDateOut'];

$save = $_POST["btnSave"];
$edit = $_POST["btnSaveEdit"];
//$sql = "insert into keluar(prop_id, Loan_payment, maintenance_cost, date)
	//		values('$propid','$loanpay','$maincost','$dateout')";	
	//$rslt = mysql_query($sql) or die(mysql_error());
	
	
	//$query ="SELECT * FROM keluar WHERE prop_id='$propid'";
//$testResult = mysql_query($query) or die('Error, query failed');    


if ($save =='Save')
	{
    //insert...
    $query ="INSERT INTO keluar(prop_id, Loan_payment, maintenance_cost, date)
    VALUES ('$propid','$loanpay','$maincost','$dateout')";
    $result = mysql_query($query) or die('Error, query failed');
}
if ($edit == 'Save')
	{ 
    //update...
    $query = "UPDATE keluar
        SET prop_id='$propid', Loan_payment='$loanpay', maintenance_cost='$maincost', date='$dateout'
        WHERE prop_id='$propid'";
        $result = mysql_query($query) or die('Error, query failed');        
}
	
	
	
	header('location:detailsdisplay.php');

?>