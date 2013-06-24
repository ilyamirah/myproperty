<?

include('connection.php');
$propid = $_GET['prop_id'];
$lid = $_GET['L_id'];
$name = $_POST['name'];
$address = $_POST['Address'];
$contactno = $_POST['ContactNo'];
$email = $_POST['Email'];
$occupation = $_POST['Occupation'];


	
	
	$query ="SELECT * FROM leaseholder WHERE prop_id='$propid'";
$testResult = mysql_query($query) or die('Error, query failed');    

if(mysql_fetch_array($testResult) == NULL){
    //insert...
    $query ="INSERT INTO leaseholder (L_name,L_address,L_contactno,L_email,L_occupation,prop_id)
    VALUES ('$name','$address','$contactno','$email','$occupation','$propid')";
    $result = mysql_query($query) or die('Error, query failed');
}else{
    //update...
    $query = "UPDATE leaseholder
        SET L_name='$name',L_address='$address',L_contactno='$contactno',L_email='$email',L_occupation='$occupation'
        WHERE prop_id='$propid'";
        $result = mysql_query($query) or die('Error, query failed');        
}
header('location:index.php');
?>