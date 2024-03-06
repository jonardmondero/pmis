<?php
include_once('../../config/config.php');
include('../../config/mssql.php');
$getRecordSQL = "SELECT count(recordId) as empno from dailytimerecord";
$getSQLResult = $con->prepare($getRecordSQL);
$getSQLResult->execute();
$resultSQL = $getSQLResult->fetch(PDO::FETCH_ASSOC);

$getTotalBTMRecord = "select count(checktime) as totalrecord from dbo.CHECKINOUT";
$getResult = $mscon->prepare($getTotalBTMRecord);
$getResult->execute();
$resultMS = $getResult->fetch(PDO::FETCH_ASSOC);
echo json_encode(["mysql"   => $resultSQL['empno'], 'mssql' => $resultMS['totalrecord']]) ;

?>