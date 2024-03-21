<?php 
include_once('../../config/config.php');
$empno = $_POST['empno'];
$entryno = $_POST['entryno'];
$date_rendered = $_POST['date_rendered'];
$date_claim = $_POST['date_claim'];

$sql = "CALL spReflectCDO(:empno,:entryno,:rendered,:date_claim)";
$stmt = $con->prepare($sql);
$stmt->execute([
    ':empno' => $empno,
    ':entryno' => $entryno,
    ':rendered' => $date_rendered,
    ':date_claim' => $date_claim
]);

if($stmt){
    echo json_encode("Success") ;
}