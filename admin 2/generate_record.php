<?php
//include('update_user.php');
//include ("../php_scripts/search_user.php");

$datefrom=$dateto=$selemployee ='';
$db = '';

 //1.1 end
if(isset($_POST['import'])){
  $empNo = '';
  $bioPin = '';
  $workId = '';
$selemployee = $_POST['sel_employee'];
  $get_employee = "Select employeeNo,biometricId,workScheduleId from bioinfo  where employeeNo = :empno";
 $prepare_employee = $con->prepare($get_employee);
  $prepare_employee->execute([':empno' => $selemployee]);
    while ($employee = $prepare_employee->fetch(PDO::FETCH_ASSOC)) { 
      $empNo = $employee['employeeNo'];
      $bioPin = $employee['biometricId'];
      $workId = $employee['workScheduleId'];
  }
 $datefrom = strtotime($_POST['datefrom']);
 $dateto= strtotime($_POST['dateto']);
    $timeIn = "O";
    $brkout = "0";

 //1.2 insert blank records in dailytimerecord
 $stmt_insert_dtr = "CALL spInsertDTR(:empno,:i)" ;
 $pre_insert_dtr = $con->prepare($stmt_insert_dtr);

 //insert day off
 $stmt_insert_off = "CALL spInsertDayOff(:empno,:worksched,:i)" ;
 $pre_insert_off = $con->prepare($stmt_insert_off);

  $format = 'Y-m-d';
     // $dates = array();
 for($z=$datefrom;$z<=$dateto;$z+=86400){
  $i = date($format, $z);
 // while($datefrom<=$dateto){
 //      $dates[] = date($format, $datefrom);
 //    $datefrom = strtotime($stepVal,$datefrom);
    
 //  // $i = date('Y-m-d', $currentDate); 
 //    } 
 //    return $dates;
   
      $pre_insert_dtr ->execute([ 
          ':empno' =>$selemployee,        
          ':i' =>$i

         
     
    ]);

    $pre_insert_off ->execute([ 
        ':empno' =>$selemployee,
         ':worksched' =>$workId,
        ':i' =>$i

    ]);
     
      $date_format = 'HH:MM';
      $format_current_date = date_create($i);
      $date_format_2 = date_format($format_current_date,"n/j/Y");
//           $formattedweddingdate = date_format($weddingdate, 'd-m-Y');
//        echo $date_format_2;
//      echo $date_format_2;
      $st_msaccess_search = "Select DISTINCT FORMAT([CHECKINOUT.CHECKTIME],'$date_format') as checktime, CHECKINOUT.CHECKTYPE as checktype ,USERINFO.BADGENUMBER from CHECKINOUT inner join USERINFO  on CHECKINOUT.USERID = USERINFO.USERID where USERINFO.BadgeNumber = '$bioPin' AND CHECKINOUT.CHECKTIME like '$date_format_2%' ";
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
         
          $insert_timeIn = "CALL spInsertTimeIn(:empno,:worksched,:i,:chktime)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
              ':empno' =>$empNo,
              ':worksched'=>$workId,
              ':i' => $i,
              ':chktime'=> $chktime
          ]);
        }
          if($chktype == $brkout){
          
          $insert_timeIn = "CALL spInsertTimeOutAM(:empno,:worksched,:i,:chktime)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
               ':empno' =>$empNo,
               ':worksched'=>$workId,
              ':i' => $i,
              ':chktime'=> $chktime
          ]);
        }
          $timeInPm = "1";
          if($chktype == $timeInPm){
          
          $insert_timeIn = "CALL spInsertTimeInPM(:empno,:worksched,:i,:chktime)";
          $insertInAm = $con->prepare($insert_timeIn);
          $insertInAm ->execute([
               ':empno' =>$empNo,
               ':worksched' =>$workId,
              ':i' => $i,
              ':chktime'=> $chktime
          ]);
              
        }
           $timeOutPM = "i";
            if($chktype == $timeOutPM ){
          
          $insert_timeIn = "CALL spInsertTimeOutPM(:empno,:worksched,:i,:chktime)";
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
     $alert_msg .= ' 
   <div class="alert alert-danger alert-dismissible">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
   <i class="icon fa fa-check"></i>You have successfully generated the department.
   </div>     
';

}
?>