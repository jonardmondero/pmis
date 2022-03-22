<?php 
include('../../config/config.php');

if (isset($_POST['empno'])) {
$empno = $_POST['empno'];
$date = $_POST['date'];

$sql = "UPDATE dailytimerecord SET
    late = '00:00:00',
    undertime = '00:00:00' 
    where employeeNo=:empno and Date = :date";
$prep = $con->prepare($sql);
$prep->execute([
':empno'    =>  $empno,
':date'     =>  $date
]);
}
?>