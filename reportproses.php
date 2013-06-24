<?
include('connection.php');
$month = $_POST['month'];
$year = $_POST['year'];

header('location:report.php?month='.$month.'&year='.$year.'');

?>