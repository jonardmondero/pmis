<?php
include('../../config/config.php');
include ('../../config/msconfig.php');
if(isset($_POST['empno'])){
	$set_selected ='';
	$biometric = '';
	$date = '';
	$location = '';
	$get_employee  = "Select b.biometricId,DATE_FORMAT(d.Date,'%c/%e/%Y') as dDate,d.Date from bioinfo b inner join dailytimerecord d on b.employeeNo = d.employeeNo where b.employeeNo =:empno and d.Date = :id";
	$prepare_emp = $con->prepare($get_employee);
	$prepare_emp->execute([':empno' => $_POST['empno'],
							':id' => $_POST['date']]);
	while($result = $prepare_emp->fetch(PDO::FETCH_ASSOC)){
		$biometric = $result['biometricId'];
		$date = $result['dDate'];
		$dateunformatted = $result['Date'];
}	
	$format_current_date = date_create($date); 
	 $date_format = 'Medium Time';
	$st_msaccess_search = "SELECT  FORMAT([CHECKINOUT.CHECKTIME],'$date_format') as checktime,CHECKINOUT.CHECKTYPE as checktype,USERINFO.BADGENUMBER,sn from CHECKINOUT inner join USERINFO  on CHECKINOUT.USERID = USERINFO.USERID where USERINFO.BadgeNumber = '$biometric' AND CHECKINOUT.CHECKTIME like '$date%'";
 // $st_msaccess_search="SELECT FORMAT([CHECKINOUT.CHECKTIME],'$date_format') AS checktime,CHECKINOUT.CHECKTYPE as checktype, USERINFO.BADGENUMBER from CHECKINOUT inner join USERINFO on CHECKINOUT.USERID = USERINFO.USERID WHERE USERINFO.BadgeNumber = '$biopin' AND CHECKINOUT.CHECKTIME like '$date%'";
 $pre_msaccess_stmt = $conn->prepare($st_msaccess_search);
 $pre_msaccess_stmt->execute();
 while( $timeresult = $pre_msaccess_stmt->fetch(PDO::FETCH_ASSOC)) {
 	if($timeresult == 0){
 		echo "failed";
 	}else{
		 //DISPLAYS THE TIME INTO THE INSERT LOG TABLE
	 $sn = $timeresult['sn'];
 	$checktime = $timeresult['checktime'];
	 $checktype = $timeresult['checktype'];
	 $checkstate = 'Check In';
	 $checkColor = 'Green';

		switch($sn){
			case "3569182360161":
			$location = "CED BTM";
			break;
			case "3486862430001":
			$location = "ITCSO BTM";
			break;
			case "3486862430384":
			$location = "CTO BTM";
			break;
			case "3569182360034":
			$location = "CMO BTM";
			break;
			case "3486862430380":
			$location = "PMSD BTM";
			break;
			case "3486862430309":
			$location = "CWD BTM";
			break;
			case "3486862430243":
			$location = "SP BTM";
			break;
			case "3486862430322":
			$location = "COA BTM";
			break;
			case "OGT7030057022400300":
			$location = "OCA BTM";
			break;
			case "OPH6040056041500373":
			$location = "CSWDO BTM";
			break;
		}



	 switch($checktype){
		case "O":
			$checkstate = 'Check In';
			$checkColor = '#F3ED1A';
			break;
		case "0":
			$checkstate = 'Break Out';
			$checkColor = '#91FF61';
			break;
		case "1":
			$checkstate = 'Break In';
			$checkColor = '#FFC100';
			break;
		case "i":
		$checkstate = 'Check Out';
		$checkColor = '#00FFEC';
		break;

	 }
	 
 	$options = array('Check In','Break Out','Break In','Check Out','Overtime In','Overtime Out');
 	echo $checktime;	
 	echo "<tr style = 'background-color:".$checkColor."'>";
 	echo "<td>";
 	echo $dateunformatted;
 	echo "</td>";
	 echo "<td>";
 	echo $location;
 	echo "</td>";
 	echo "<td>";
 	echo $checktime;
 	echo "</td>";
 	echo "<td>";

	 echo '<select id = "insert_record">';
 	foreach ($options as $value){
		if($checkstate == $value){
			$set_selected = 'selected';
		}else{
			$set_selected ='';
		}
		
 		echo '<option '.$set_selected.' val  = <?php echo $options?>';
echo $value;
echo '</option>';
};

echo'</select>';
echo "</td>";
echo '<td><button class="btn btn-primary btn-md btn-circle reflectrecords" data-id='.$date.'> <i
            class="fa fa-save"></i></button> </td>';
echo "</tr>";
}

}


}
?>