<?php
include_once ('../../config/config.php');
if(isset($_POST['empno'])){
	// echo "<pre>";
	// print_r("jonard");
	// echo "</pre>";
	$empno =  $_POST['empno'];
	$date = $_POST['dateofupdate'];
	// $id = 		$_POST['idpost'];

	// $checkin = 	str_replace(' ', '', $_POST['checkin']);
	// $breakout =str_replace(' ', '',  $_POST['breakout']);
	// $breakin = str_replace(' ', '', $_POST['breakin']);
	// $checkout= str_replace(' ', '', $_POST['checkout']);
	// $overtimein = str_replace(' ', '', $_POST['overtimein']);
	// $overtimeout =str_replace(' ', '', $_POST['overtimeout']);


	$field = 	$_POST['field'];
	$value =  $_POST['value'];
	// $breakin =  $_POST['breakin'];
	// $checkout=  $_POST['checkout'];
	// $overtimein = $_POST['overtimein'];
	// $overtimeout =$_POST['overtimeout'];
	// $late = $_POST['late'];
	// $late = $_POST['late'];
	// $undertime = $_POST['undertime'];
	// $late == '' ? $late = '00:00:00' : $late = $_POST['late'];
	// $undertime == '' ? $undertime = '00:00:00' : $undertime = $_POST['undertime'];
	
// $updatequery= "CALL spUpdateDtr(:empno,:date,:field,:value)";
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

$updatequery = "UPDATE dailytimerecord SET ".$field." = :value
WHERE employeeNo =:empno AND DATE = :date LIMIT 1";
$prepare_query =$con->prepare($updatequery);
$prepare_query->bindParam(':empno' , $empno);
$prepare_query->bindParam(':date',	$date);
$prepare_query->bindParam(':value',	$value);
$prepare_query->execute();

unset($prepare_query);

}

?>