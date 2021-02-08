<?php 
include ('../config/config.php');
if(isset($_POST['dept'])){
$department = $_POST['dept'];
$emp_status = $_POST['empstatus'];
// $get_department = "CALL spGetEmployeeDepartment(:department,:empstatus)";
$get_department = "SELECT *,CONCAT(lastName,', ',firstName,', ',LEFT(middleName,1),'.') as fullName from bioinfo where department =:department AND employmentStatus = :empstatus AND status = 'Active' ORDER BY lastName";
$set_department = $con->prepare($get_department);
$set_department->execute([':department' => $department,
							':empstatus'=>$emp_status]);
while($result = $set_department->fetch(PDO::FETCH_ASSOC)){

	$empno = $result['employeeNo'];
	$fullname = $result['fullName'];
	echo '<tr style="font-family:Lucida Console;font-size:13px">';
	echo '<td>'.$empno.'</td>';
	echo "<td>".$fullname."</td></tr>";
	// echo '<td><button class = btn btn-success btn-sm btn-flat id ="showdtr"  > <i class = "fa fa-edit"</button> </td> </tr>';

}



}

?>