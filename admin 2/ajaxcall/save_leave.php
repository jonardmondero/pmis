<?php
include ('../../config/config.php');
if(isset($_POST['empno'])){
$empno = $_POST['empno'];
$leavetype = $_POST['leavetype'];
$from = $_POST['from'];
$to = $_POST['to'];
$duration = $_POST['duration'];

$iterator = new MultipleIterator();
$iterator->attachIterator(new ArrayIterator($leavetype));
$iterator->attachIterator(new ArrayIterator($from));
$iterator->attachIterator(new ArrayIterator($to));
$iterator->attachIterator(new ArrayIterator($duration));
$message = 'Leave Entry has been saved.';
$status = 'success';
foreach($iterator as $value){

$check_leave = "SELECT * FROM leaveentry WHERE employeeNo = :empno AND leaveType = :leavetype AND dateFrom = :from AND dateTo = :to AND duration = :duration";
$prep_check = $con->prepare($check_leave);
$prep_check->execute([
    ':empno' =>$empno,
    ':leavetype' =>$value[0],
    ':from' =>$value[1],
    ':to' =>$value[2],
    ':duration' =>$value[3]
]);
$check = $prep_check->fetch(PDO::FETCH_ASSOC);
if($check){
    $message = 'Leave with date '.$value[1].' to '.$value[2].' already exists.';
    $status = 'error';


    break;
}    
$save_leave = "CALL spInsertLeave(:empno,:leavetype,:from,:to,:duration)";
if($value[0]!= ''){
$prep_leave = $con->prepare($save_leave);
$prep_leave->execute([
    ':empno' =>$empno,
    ':leavetype' =>$value[0],
    ':from' =>$value[1],
    ':to' =>$value[2],
    ':duration' =>$value[3]
]);
 

}
}
echo json_encode(['status' => $status, 'message' => $message]);


}
?>