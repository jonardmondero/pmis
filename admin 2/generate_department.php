<?php
//include('update_user.php');
//include ("../php_scripts/search_user.php");
include('../config/config.php');
include('../config/msconfig.php');
// $datefrom=$dateto=$selemployee ='';
$db = '';
// $st_get_employee = "SELECT CONCAT(e.firstName,' ', SUBSTRING(e.middleName,1,1),'.',' ',e.lastName) as fullName, e.employeeNo as empno, b.biometricId as biopin from employee e inner join biopin b on e.employeeNo = b.employeeNo";
// $result = $con->prepare($st_get_employee);
// $result->execute();
 //1.1 end
if(isset($_POST['import_dep'])){

//select the employees in the selected department
  $seldep = $_POST['selectdep'];
  $select_emp = "SELECT employeeNo,biometricId,workScheduleId from bioinfo where department = :dep and status ='Active'";
  $prepare_emp = $con->prepare($select_emp);
  $prepare_emp->execute([':dep' => $seldep]);
  while($get_result = $prepare_emp->fetch(PDO::FETCH_ASSOC)){

 	$empNo = $get_result['employeeNo'];
    $bioPin =$get_result['biometricId']; 
     $workId =$get_result['workScheduleId'];
 $datefrom = strtotime($_POST['datefrom']);
 $dateto= strtotime($_POST['dateto']);
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


 $stmt_insert_off = "CALL spInsertDayOff(:empno,:work,:i)" ;
 $pre_insert_off = $con->prepare($stmt_insert_off);
 // for($currentDate = $datefrom; $currentDate<=$dateto;$currentDate+=(86400)){
 // for($i=$datefrom;$i<=$dateto;$i+=86400){
  $stepVal = '+1 day';
  $format = 'Y-m-d';
  for($z=$datefrom;$z<=$dateto;$z+=86400){
  $i = date($format, $z);


      $pre_insert_dtr ->execute([ 
          ':empno' =>$empNo,
          ':i' =>$i
	

         
    ]);

     $pre_insert_off ->execute([ 
        ':empno' =>$empNo,
        ':work' =>$workId,
        ':i' =>$i

    ]);
  
     
      $date_format = 'HH:MM';
      $format_current_date = date_create($i);
      $date_format_2 = date_format($format_current_date,"n/j/Y");
//           $formattedweddingdate = date_format($weddingdate, 'd-m-Y');
//        echo $date_format_2;
//      echo $date_format_2;
      $st_msaccess_search = "SELECT DISTINCT FORMAT([CHECKINOUT.CHECKTIME],'$date_format') as checktime,CHECKINOUT.CHECKTYPE as checktype ,USERINFO.BADGENUMBER from CHECKINOUT inner join USERINFO  on CHECKINOUT.USERID = USERINFO.USERID where USERINFO.BadgeNumber = '$bioPin' AND CHECKINOUT.CHECKTIME like '$date_format_2%'";
      $pre_msaccess_stmt = $conn->prepare($st_msaccess_search);
      $pre_msaccess_stmt->execute();
      while ($time_result = $pre_msaccess_stmt->fetch(PDO::FETCH_ASSOC)) {
        $chktime =  $time_result['checktime'];
        $chktype = $time_result['checktype'];
//          echo $bioPin;
//          echo $date_format_2;
//       echo $chktime;
//        echo $chktype;
         
        if($chktype == $timeIn){
         
          $insert_timeIn = "CALL spInsertTimeIn(:empno,:workid,:i,:chktime)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
              ':empno' =>$empNo,
              ':workid' =>$workId,
              ':i' => $i,
              ':chktime'=> $chktime
          ]);
        }
          if($chktype == $brkout){
          
          $insert_timeIn = "CALL spInsertTimeOutAM(:empno,:workid,:i,:chktime)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
               ':empno' =>$empNo,
               ':workid' => $workId,
              ':i' => $i,
              ':chktime'=> $chktime
          ]);
        }
          $timeInPm = "1";
          if($chktype == $timeInPm){
          
          $insert_timeIn = "CALL spInsertTimeInPM(:empno,:workid,:i,:chktime)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
               ':empno' =>$empNo,
               ':workid' =>$workId,
              ':i' => $i,
              ':chktime'=> $chktime
          ]);
              
        }
           $timeOutPM = "i";
            if($chktype == $timeOutPM ){
          
          $insert_timeIn = "CALL spInsertTimeOutPM(:empno,:workid,:i,:chktime)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
               ':empno' =>$empNo,
               ':workid' =>$workId,
                ':i' => $i,
              ':chktime'=> $chktime
          ]);
              
      }

      $timeOutPM = "o";
      if($chktype == $timeOutPM ){
    
    $insert_timeIn = "CALL spInsertOvertimeIn(:empno,:worksched,:i,:chktime)";
    $insertInAm = $con->prepare($insert_timeIn);
    $insertInAm ->execute([
         ':empno' =>$empNo,
         ':worksched' =>$workId,
        ':i' => $i,
        ':chktime'=> $chktime
    ]);
        
 
}
$timeOutPM = "U";
if($chktype == $timeOutPM ){

$insert_timeIn = "CALL spInsertOvertimeOut(:empno,:worksched,:i,:chktime)";
$insertInAm = $con->prepare($insert_timeIn);
$insertInAm ->execute([
   ':empno' =>$empNo,
   ':worksched' =>$workId,
  ':i' => $i,
  ':chktime'=> $chktime
]);
  

}
     
    }
    if($i == $dateto){
      break;
    }
  }
    
}
 $alert_msg .= ' 
   <div class="alert alert-success alert-dismissible">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
   <i class="icon fa fa-check"></i>You have successfully generated the department.
   </div>     
';
}
?>