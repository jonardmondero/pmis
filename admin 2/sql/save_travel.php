<?php 

// save the data from the table in database
if(isset($_POST['empno'])){	
	$message = '';
include('../../config/config.php');
$message = "The Official Business entry has been encoded";
$empno = $_POST['empno'];
$fname = $_POST['fname'];
$from = $_POST['from'];
$to = $_POST['to'];
$duration = $_POST['duration'];
$type = $_POST['type'];	
$details = $_POST['details'];	
$query = "CALL spInsertTravel(:empno,:fname,:from,:to,:duration,:type,:detail)";
$prep_query = $con->prepare($query);

if($prep_query->execute([
	':empno' =>$empno,
	':fname' =>$fname,
	':from' =>$from,
	':to' =>$to,
	':duration' =>$duration,
	':type' =>$type,
	':detail' =>$details
])){
$message = "Official Business encoded";
}

}else {
	$message = "Please check fields!";
}
echo $message;
?>