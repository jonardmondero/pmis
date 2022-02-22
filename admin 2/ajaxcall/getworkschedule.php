<?php
include('../../config/config.php');

if(isset($_POST['workschedid'])){
    $workschedid = '';
    $workscheddescp = '';
    $remarks = '';
    $status = '';
    $inAM ='';
    $outAM = '';
    $inPM = '';
    $outPM = '';


$sql = "SELECT * FROM workschedule w inner join workscheduledetail d on w.workScheduleId = d.workScheduleDetail where d.workScheduleDetail =:workid AND d.Day =:days LIMIT 1";
$prepare_stmt = $con->prepare($sql);
$prepare_stmt->execute([
    ':workid' => $_POST['workschedid'],
    ':days' => $_POST['Day']
]);
while ($result = $prepare_stmt->fetch(PDO::FETCH_ASSOC)) {
    $workschedid = $result['workScheduleId'];
    $workscheddescp =$result['workScheduleDescription'];
    $remarks = $result['remarks'];
    $status = $result['status'];
    $inAM = $result['inAM'];
    $outAM = $result['outAM'];
    $inPM = $result['inPM'];
    $outPM = $result['outPM'];

}

$data = array(
    'workschedid'=>$workschedid,
    'workdesc'  =>$workscheddescp,
    'remarks'   =>  $remarks,
    'status'    =>  $status,
    'inAM'  => $inAM,
    'outAM' => $outAM,
    'inPM' => $inPM,
    'outPM' => $outPM
);

echo json_encode($data);


}


?>