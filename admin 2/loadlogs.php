<?php
include('../config/config.php');
include ('../config/msconfig.php');
if(isset($_POST['empno'])){
	// echo $_POST['empno'];
	 // echo $_POST['date'];
	$biometric = '';
	$date = '';
	// $date = $_POST['date'];
	$get_employee  = "Select b.biometricId,DATE_FORMAT(d.Date,'%c/%e/%Y') as Date from bioinfo b inner join dailytimerecord d on b.employeeNo = d.employeeNo where b.employeeNo =:empno and d.Date = :id";
	$prepare_emp = $con->prepare($get_employee);
	$prepare_emp->execute([':empno' => $_POST['empno'],
							':id' => $_POST['date']]);
	while($result = $prepare_emp->fetch(PDO::FETCH_ASSOC)){
		$biometric = $result['biometricId'];
		$date = $result['Date'];
}
	$format_current_date = date_create($date); 
	 $date_format = 'HH:MM';
	  // $date_format_2 = date_format($date,"n/j/Y");
	 // $date_format_2=  date('n/j/Y', strtotime($date));
	  // echo print_r($format_current_date);
	   // echo $date;
	  // echo $date_format_2;

	$st_msaccess_search = "SELECT  FORMAT([CHECKINOUT.CHECKTIME],'$date_format') as checktime,CHECKINOUT.CHECKTYPE as checktype,USERINFO.BADGENUMBER from CHECKINOUT inner join USERINFO  on CHECKINOUT.USERID = USERINFO.USERID where USERINFO.BadgeNumber = '$biometric' AND CHECKINOUT.CHECKTIME like '$date%'";
 // $st_msaccess_search="SELECT FORMAT([CHECKINOUT.CHECKTIME],'$date_format') AS checktime,CHECKINOUT.CHECKTYPE as checktype, USERINFO.BADGENUMBER from CHECKINOUT inner join USERINFO on CHECKINOUT.USERID = USERINFO.USERID WHERE USERINFO.BadgeNumber = '$biopin' AND CHECKINOUT.CHECKTIME like '$date%'";
 $pre_msaccess_stmt = $conn->prepare($st_msaccess_search);
 $pre_msaccess_stmt->execute();
 while( $timeresult = $pre_msaccess_stmt->fetch(PDO::FETCH_ASSOC)) {
 	if($timeresult == 0){
 		echo "failed";
 	}else{
 	$checktime = $timeresult['checktime'];
	 $checktype = $timeresult['checktype'];
	 $checkstate = '';
	 if($checktype == 'O'){
		$checkstate = 'Check In';
	 }
	 if($checktype == '0'){
		$checkstate = 'Break Out';
	 }
	 if($checktype == '1'){
		$checkstate = 'Break In';
	 }
	 if($checktype == 'i'){
		$checkstate = 'Check Out';
	 }
	 
	 
 	$options = array('Check In','Break Out','Break In','Check Out','Overtime In','Overtime Out');
 	echo $checktime;	
 	echo "<tr>";
 	echo "<td>";
 	echo $date;
 	echo "</td>";
 	echo "<td>";
 	echo $checktime;
 	echo "</td>";
 	echo "<td>";
 	echo $checkstate;
 	echo "</td>";
 	echo "<td>";
 	echo '<select id = "insert">';
 	foreach ($options as $value){
 		echo '<option val="<? echo $value ?>">';
 		echo $value;
 		echo '</option>';
 	};
 	echo'</select>';
 	echo "</td>";
 	echo '<td><button class = "btn btn-warning btn-sm btn-flat addlogs" data-id='.$recordId.' > <i class = "fa fa-save"</button> </td>';
 	echo "</tr>";
 }

 }


}
?>
