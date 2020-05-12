<?php
include('../config/config.php');
$employeenum=$fname=$lname=$mname=$bioid=$supervisor=$emptype=$status=$department='';
if(isset($_POST['submit'])){


	$employeenum = $_POST['empnum'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$mname = $_POST['mname'];
	$bioid = $_POST['bioid'];
	$dep = $_POST['department'];
	$supervisor = $_POST['supervisor'];
	$emptype = $_POST['estatus'];
	$status = $_POST['status'];
// $search_employee ="SELECT * from bioinfo WHERE employeeNo ='$employeenum'";

// $sql =$con->query($search_employee);

	$insert_stmt = "INSERT INTO bioinfo SET 
					employeeNo = :empno,
					firstName  = :fname,
					lastName	=:lname,
					middleName = :mname,
					biometricId	=:bioid,
					department = :dep,
					employmentStatus = :empstatus,
					supervisor =:supervisor,
					status = :status";
	$set_stmt = $con->prepare($insert_stmt);
	$set_stmt->execute([
		':empno' => $employeenum,
		':fname'=>	$fname,
		':lname' => $lname,
		':mname'=> $mname,
		':bioid' =>	$bioid,
		':dep' => $dep,
		':empstatus' =>$emptype,
		'supervisor' =>$supervisor,
		':status' =>$status
  
	]);	


	 $alert_msg .= ' 
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-check"></i>You have successfully inserted the user.
            </div>     
        ';
 // echo post_message('Data Inserted', 'success');  
}
 		

?>