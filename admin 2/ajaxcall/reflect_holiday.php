<?php
include('../../config/config.php');
if(isset($_POST['id'])){

    $id = $_POST['id'];
    $deptId = $_POST['deptId'];

$getemployees = "Select employeeNo from bioinfo where department = :department";
$getemployees_total = $con->prepare($getemployees);
$getemployees_total->execute([':department' =>  $deptId]);
while ($employee_data = $getemployees_total->fetch(PDO::FETCH_ASSOC)) {
 
$empno  =   $employee_data['employeeNo'];


$sql = "CALL spReflectHoliday(:id,:deptId)";

$callSP = $con->prepare($sql);
$callSP->execute([
    ':id'   =>  $id,
    ':deptId' => $empno
]);

}
echo "You reflected the Holiday";
}
?>