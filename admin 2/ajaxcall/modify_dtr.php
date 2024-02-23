<?php
include_once('../../config/config.php');
if(isset($_POST['empno'])){
$origin= $_POST['origin'];
$empno = $_POST['empno'];
$date = $_POST['date'];
$value = $_POST['second_value'];
$destination = $_POST['destination'];
    $sql = "UPDATE dailytimerecord SET
    ".$origin."= :origin,
    ".$destination."= :value
    where EmployeeNo = :empno and  date = :date  LIMIT 1";
    $execute = $con->prepare($sql);
    $execute->execute([':empno' => $empno, ':origin' => '', ':value' => $value, ':date' => $date]);
}
?>