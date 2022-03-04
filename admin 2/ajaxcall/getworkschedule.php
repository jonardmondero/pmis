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


$sql = "CALL spGetWorkSchedule(:workid,:days)";
$prepare_stmt = $con->prepare($sql);
$prepare_stmt->execute([
    ':workid' => $_POST['workschedid'],
    ':days' => $_POST['Day']
]);
while ($result = $prepare_stmt->fetch(PDO::FETCH_ASSOC)) {
  
    $inAM = $result['inAM'];
    $outAM = $result['outAM'];
    $inPM = $result['inPM'];
    $outPM = $result['outPM'];

}

$data = array(
    'inAM'  => $inAM,
    'outAM' => $outAM,
    'inPM' => $inPM,
    'outPM' => $outPM
);

echo json_encode($data);


}


?>