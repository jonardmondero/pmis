<?php
include('../config/config.php');

if(isset($_POST['workId'])){
$workid = $_POST['workId'];
$day = $_POST['Day'];
$checkin = $_POST['CheckIn'];
$breakout = $_POST['BreakOut'];
$breakin = $_POST['BreakIn'];
$checkout = $_POST['CheckOut'];

$insert_stmt = "INSERT INTO workscheduledetail set
				workScheduleDetail = :workid,
				Day 	= 	:day,
				inAM	=	:checkin,
				outAM	=	:breakout,
				inPM	=	:breakin,
				outPM	=	:checkout";
	$prepare_stmt = $con->prepare($insert_stmt);
	$prepare_stmt->execute([
		':workid'	=>	$workid,
		':day'=>		$day,
		':checkin'=>	$checkin,
		':breakout'=>	$breakout,
		':breakin'=>	$breakin,
		':checkout'=>	$checkout

	]);
		$delete = "DELETE FROM workscheduledetail WHERE workScheduleDetail = '$workid' AND
			Day = '' AND inAM = '' AND outAM = '' AND inPM = ''  AND outPM = '' ";
			$delete_prepare = $con->prepare($delete);
			$delete_prepare->execute();
}
?>