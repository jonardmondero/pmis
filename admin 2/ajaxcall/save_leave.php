<?php
include ('../../config/config.php');
if(isset($_POST['empno'])){

$empno = $_POST['empno'];
$leavetype = $_POST['leavetype'];
$from = $_POST['from'];
$to = $_POST['to'];
$duration = $_POST['duration'];
$message = 'Leave Entry has been saved.';
    
$save_leave = "CALL spInsertLeave(:empno,:leavetype,:from,:to,:duration)";
$prep_leave = $con->prepare($save_leave);
$prep_leave->execute([
    ':empno' =>$empno,
    ':leavetype' =>$leavetype,
    ':from' =>$from,
    ':to' =>$to,
    ':duration' =>$duration
]);
echo $message;
    
}
?>