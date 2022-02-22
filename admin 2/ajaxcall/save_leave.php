<?php
include ('../../config/config.php');
if(isset($_POST['empno'])){

$empno = $_POST['empno'];
$leavetype = $_POST['leavetype'];
$from = $_POST['from'];
$to = $_POST['to'];
$duration = $_POST['duration'];
//check if there is existing leave encoded.
$checkLeave = "SELECT EmployeeNo FROM leaveentry WHERE 
EmployeeNo = :empno AND 
dateFrom = :ffrom AND 
 dateTo = :tto AND 
 duration = :duration";

$checkLeave_prep = $con->prepare($checkLeave);
$checkLeave_prep->execute([
':empno'=>$empno,
':ffrom'=>$from,
':tto'=>$to,
':duration'=>$duration
]);
//decide if the insert will be executed if there is no record.

    if($checkLeave_prep->rowCount() == 0){
        
        $save_leave = "CALL spInsertLeave(:empno,:leavetype,:from,:to,:duration)";
$prep_leave = $con->prepare($save_leave );
$prep_leave->execute([
    ':empno' =>$empno,
    ':leavetype' =>$leavetype,
    ':from' =>$from,
    ':to' =>$to,
    ':duration' =>$duration
]);
echo "You have successfully applied a leave!";
    }
    else
    { 
echo "There is already and existing application on this Date:";
}
}
?>