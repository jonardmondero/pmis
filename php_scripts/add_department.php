<?php
 $alert_msg  = '';
if(isset($_POST['submit'])){
$deptid = $_POST['deptId'];
$deptname =  $_POST['deptname'];
// $create_dept = "CALL spAddDepartment(:deptid,:deptName)";
$create_dept = "INSERT INTO department SET deptId =:deptId, departmentDescription = :deptName , status  = 'Active'";
$prep_dept = $con->prepare($create_dept);
$prep_dept->execute([':deptId'  => $deptid,
                ':deptName' =>$deptname
                    ]);
 $alert_msg .= '<div class="new-alert new-alert-success alert-dismissible">
                <i class="icon fa fa-success"></i>
                Department has been added.
                    </div>     
';

}

if(isset($_POST['save-edit'])){
    $deptid = $_POST['deptId'];
    $deptname =  $_POST['deptname'];
    $status =  $_POST['edit-status'];

  $updateDept = "UPDATE department SET
    departmentDescription = :deptname,
    `status` = :stat
    WHERE deptId = :deptId";

$executeDept = $con->prepare($updateDept);
$executeDept->execute([
':deptname' => $deptname,
':stat' =>  $status,
':deptId' => $deptid
]);

$alert_msg .= '<div class="new-alert new-alert-warning alert-dismissible">
                <i class="icon fa fa-success"></i>
                      Department has been modified.
                    </div>     
';
}

if(isset($_POST['delete'])){

    $deptid = $_POST['deptId'];

    $deleteDept = "DELETE FROM department  WHERE 
   deptId = :deptid ";

$executeDelete = $con->prepare($deleteDept);
$executeDelete->execute([
    ':deptid'   =>  $deptid
]);
    
$alert_msg .= '<div class="new-alert new-alert-danger alert-dismissible">
                <i class="icon fa fa-success"></i>
                      Department has been deleted.
                    </div>     
';
}
?>

