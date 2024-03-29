<?php
//include('update_user.php');
//include ("../php_scripts/search_user.php");
session_start();
include_once('../../config/config.php');
// include('../../config/msconfig.php');
include_once('../../config/mssql.php');
// $datefrom=$dateto=$selemployee ='';
$db = '';
// $st_get_employee = "SELECT CONCAT(e.firstName,' ', SUBSTRING(e.middleName,1,1),'.',' ',e.lastName) as fullName, e.employeeNo as empno, b.biometricId as biopin from employee e inner join biopin b on e.employeeNo = b.employeeNo";
// $result = $con->prepare($st_get_employee);
// $result->execute();
 //1.1 end
// $empstatus = $_POST['emp_status'];
//select the employees in the selected department
  $seldep = $_POST['selectdep'];
  $iterator = new MultipleIterator();
  $iterator->attachIterator(new ArrayIterator($seldep));
  $iterator->attachIterator(new ArrayIterator($_POST['datefrom']));
  $iterator->attachIterator(new ArrayIterator($_POST['dateto']));
foreach($iterator as $value){
  if($_SESSION['currentGeneration'] == '' || $_SESSION['currentGeneration'] != $value[0]){
    
    $_SESSION['currentGeneration'] = $value; // SET THE SESSION INTO CURRENT DEPARTMENT //CHECK IF THE DEPARTMENT IS NOT CURRENTLY GENERATED BY OTHER USERS.
  $select_emp = "SELECT employeeNo,biometricId,workScheduleId,schedule from bioinfo 
  where department = :dep 
  and status ='Active'";
  $prepare_emp = $con->prepare($select_emp);
  $prepare_emp->execute([':dep' => $value[0]
                        ]);
  while($get_result = $prepare_emp->fetch(PDO::FETCH_ASSOC)){

 	$empNo = $get_result['employeeNo'];
    $bioPin =$get_result['biometricId']; 
     $workId =$get_result['workScheduleId'];
     $bolsched =$get_result['schedule'];
 $datefrom = strtotime($value[1]);
 $dateto= strtotime($value[2]);
    $timeIn = "O";
    $brkout = "0";

     // $interval = new DateInterval('P1D'); 
  
    // $realEnd = new DateTime($dateto); 
    // $realEnd->add($interval); 
  
    // $period = new DatePeriod(new DateTime($datefrom), $interval, $realEnd); 
     
    
 //1.2 insert blank records in dailytimerecord
 $stmt_insert_dtr = "CALL spInsertDTR(:empno,:i)" ;
 $pre_insert_dtr = $con->prepare($stmt_insert_dtr);

 //insert day off
//  $period = new DatePeriod(
//      new DateTime($datefrom),
//      new DateInterval('P1D'),
//      new DateTime($dateto)
// );


 $stmt_insert_off = "CALL spInsertDayOff(:empno,:work,:i,:bolsched)" ;
 $pre_insert_off = $con->prepare($stmt_insert_off);
 // for($currentDate = $datefrom; $currentDate<=$dateto;$currentDate+=(86400)){
 // for($i=$datefrom;$i<=$dateto;$i+=86400){
  $stepVal = '+1 day';
  $format = 'Y-m-d';

  $st_msaccess_search = "SELECT distinct top 20 checktype ,checktime,sn ,badgenumber from checkinout  
  inner join userinfo  on  checkinout.USERID = userinfo.USERID
   where userinfo.badgenumber = :biometric and 
    DATEPART(yy,checktime)= :year AND 
    datepart(mm,checktime) = :month and datepart(dd,checktime)= :day 
    ORDER by checktime";

  $pre_msaccess_stmt = $mscon->prepare($st_msaccess_search);

  $insert_timeIn = "CALL spInsertLogs(:empno,:worksched,:i,:chktime,:bolsched,:state)";
  $insertInAm = $con->prepare($insert_timeIn);

  for($z=$datefrom;$z<=$dateto;$z+=86400){
  $i = date($format, $z);


      $pre_insert_dtr ->execute([ 
          ':empno' =>$empNo,
          ':i' =>$i
	

         
    ]);

     $pre_insert_off ->execute([ 
        ':empno' =>$empNo,
        ':work' =>$workId,
        ':i' =>$i,
        ':bolsched' =>$bolsched

    ]);
  
     //GET THE TIME BASE ON THE USER TRANSACTION TYPE
      $date_format = 'HH:MM';
      $format_current_date = date_create($i);
      // $date_format_2 = date_format($format_current_date,"n/j/Y");
      $date_format_year = date_format($format_current_date,"Y");
      $date_format_month = date_format($format_current_date,"m");
      $date_format_day = date_format($format_current_date,"d");
//           $formattedweddingdate = date_format($weddingdate, 'd-m-Y');
//        echo $date_format_2;
//      echo $date_format_2;



      // $st_msaccess_search = "SELECT DISTINCT TOP 20 CHECKINOUT.CHECKTYPE as checktype ,FORMAT([CHECKINOUT.CHECKTIME],'$date_format') as checktime, USERINFO.BADGENUMBER from CHECKINOUT inner join USERINFO  on CHECKINOUT.USERID = USERINFO.USERID where USERINFO.BadgeNumber = '$bioPin' AND CHECKINOUT.CHECKTIME like '$date_format_2%'";
     

      $pre_msaccess_stmt->execute([
        ':biometric'	=>	 $bioPin,
	':year'	=>	 $date_format_year,
	':month'	=>	 $date_format_month,
	':day'	=>	 $date_format_day
]);


      while ($time_result = $pre_msaccess_stmt->fetch(PDO::FETCH_ASSOC)) {
        $chktime =  $time_result['checktime'];
        $chktype = $time_result['checktype'];
//          echo $bioPin;
//          echo $date_format_2;
//       echo $chktime;
//        echo $chktype;


$insertInAm ->execute([
    ':empno' =>$empNo,
    ':worksched'=>$workId,
    ':i' => $i,
    ':chktime'=> $chktime,
    ':bolsched'=> $bolsched,
    ':state' => $chktype
]);

        // if($chktype == $timeIn){
         
        //   $insert_timeIn = "CALL spInsertTimeIn(:empno,:workid,:i,:chktime,:bolsched)";
        //   $insertInAm = $con->prepare($insert_timeIn);
        //   $insertInAm ->execute([
        //       ':empno' =>$empNo,
        //       ':workid' =>$workId,
        //       ':i' => $i,
        //       ':chktime'=> $chktime,
        //       ':bolsched' =>$bolsched
        //   ]);
        // }
        //   if($chktype == $brkout){
          
        //   $insert_timeIn = "CALL spInsertTimeOutAM(:empno,:workid,:i,:chktime,:bolsched)";
        //   $insertInAm = $con->prepare($insert_timeIn);
        //   $insertInAm ->execute([
        //        ':empno' =>$empNo,
        //        ':workid' => $workId,
        //       ':i' => $i,
        //       ':chktime'=> $chktime,
        //       ':bolsched' =>$bolsched
        //   ]);
        // }
        //   $timeInPm = "1";
        //   if($chktype == $timeInPm){
          
        //   $insert_timeIn = "CALL spInsertTimeInPM(:empno,:workid,:i,:chktime,:bolsched)";
        //   $insertInAm = $con->prepare($insert_timeIn);
        //   $insertInAm ->execute([
        //        ':empno' =>$empNo,
        //        ':workid' =>$workId,
        //       ':i' => $i,
        //       ':chktime'=> $chktime,
        //       ':bolsched' =>$bolsched
        //   ]);
              
        // }
      //      $timeOutPM = "i";
      //       if($chktype == $timeOutPM ){
          
      //     $insert_timeIn = "CALL spInsertTimeOutPM(:empno,:workid,:i,:chktime,:bolsched)";
      //     $insertInAm = $con->prepare($insert_timeIn);
      //     $insertInAm ->execute([
      //          ':empno' =>$empNo,
      //          ':workid' =>$workId,
      //           ':i' => $i,
      //         ':chktime'=> $chktime,
      //         ':bolsched' =>$bolsched
      //     ]);
              
      // }

//       $timeOutPM = "o";
//       if($chktype == $timeOutPM ){
    
//     $insert_timeIn = "CALL spInsertOvertimeIn(:empno,:worksched,:i,:chktime,:bolsched)";
//     $insertInAm = $con->prepare($insert_timeIn);
//     $insertInAm ->execute([
//          ':empno' =>$empNo,
//          ':worksched' =>$workId,
//         ':i' => $i,
//         ':chktime'=> $chktime,
//         ':bolsched' =>$bolsched
//     ]);
        
 
// }
// $timeOutPM = "U";
// if($chktype == $timeOutPM ){

// $insert_timeIn = "CALL spInsertOvertimeOut(:empno,:worksched,:i,:chktime,:bolsched)";
// $insertInAm = $con->prepare($insert_timeIn);
// $insertInAm ->execute([
//    ':empno' =>$empNo,
//    ':worksched' =>$workId,
//   ':i' => $i,
//   ':chktime'=> $chktime
// ]);
  

// }
     
    }
    if($i == $dateto){
      break;
    }
  }
    
}
$_SESSION['currentGeneration'] = '';
}
}

echo "Congratulations you successfully imported the selected department.";
$con = null;
$mscon = null;

?>