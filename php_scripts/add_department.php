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
                       Data Inserted
                    </div>     
';

}

?>