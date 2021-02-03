<?php
include ('../../config/config.php');
if(isset($_POST['empno'])){
	// echo "<pre>";
	// print_r("jonard");
	// echo "</pre>";
	$empno =  $_POST['empno'];
	$date = $_POST['date'];
	// $id = 		$_POST['idpost'];
	$checkin = 	str_replace(' ', '', $_POST['checkin']);
	$breakout =str_replace(' ', '',  $_POST['breakout']);
	$breakin = str_replace(' ', '', $_POST['breakin']);
	$checkout= str_replace(' ', '', $_POST['checkout']);
	$overtimein = str_replace(' ', '', $_POST['overtimein']);
	$overtimeout =str_replace(' ', '', $_POST['overtimeout']);
	$late = $_POST['late'];
	$undertime = $_POST['undertime'];
	$late == '' ? $late = '00:00:00' : $late = $_POST['late'];
	$undertime == '' ? $undertime = '00:00:00' : $undertime = $_POST['undertime'];
	
$updatequery= "CALL spUpdateDtr(:empno,:date,:checkin,:breakout,:breakin,:checkout,:overtimein,:overtimeout,:late,:undertime)";
	// $updatequery = "UPDATE dailytimerecord SET 
	// 				inAM = :checkin,
	// 				outAM = :breakout,
	// 				inPM 	=:breakin,
	// 				outPM  = :checkout,
	// 				otIn 	=:overtimein,
	// 				otOut 	=:overtimeout,
	// 				late 	=:late,
	// 				undertime =:undertime,
	// 				 WHERE recordId = :id and
	// 				Date = :date  and employeeNo = :empno";
$prepare_query =$con->prepare($updatequery);
$prepare_query->execute([
	':empno' => $empno,
	':date'	=>	$date,
	':checkin' => $checkin,
	':breakout' =>	$breakout,
	':breakin'	=>	$breakin,
	':checkout'	=>	$checkout,
	':overtimein'	=>	$overtimein,
	':overtimeout'	=>	$overtimeout,
	':late'	=>			$late,
	':undertime'	=>$undertime
]);


}

?>