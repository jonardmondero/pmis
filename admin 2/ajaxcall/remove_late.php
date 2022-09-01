<?php 
include('../../config/config.php');

if (isset($_POST['empno'])) {
 
$opt = $_POST['opt'];
//remove the late in the dtr
if($opt == 'removelate'){
$empno = $_POST['empno'];
$date = $_POST['date'];

$sql = "UPDATE dailytimerecord SET
    late = '00:00:00'
    where employeeNo=:empno and Date = :date";
$prep = $con->prepare($sql);
$prep->execute([
':empno'    =>  $empno,
':date'     =>  $date
]);
}  
//remove the undertime in the dtr
if($opt == 'removeundertime'){
    $empno = $_POST['empno'];
    $date = $_POST['date'];
    
    $sql = "UPDATE dailytimerecord SET
        undertime = '00:00:00'
        where employeeNo=:empno and Date = :date";
    $prep = $con->prepare($sql);
    $prep->execute([
    ':empno'    =>  $empno,
    ':date'     =>  $date
    ]);
    } 

//REMOVE THE LATE AND UNDERTIME
    if($opt == 'removelateundertime'){
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
}
?>