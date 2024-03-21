<?php

    include('../../config/config.php');
    $data = json_decode($_POST['data'], true); // assuming 'data' is the key of the POST request
    $empno = $data[0]['empno'];
    $date = $data[0]['date'];
    $inAM = $data[0]['inAM'];
    $outAM = $data[0]['outAM'];
    $inPM = $data[0]['inPM'];
    $outPM = $data[0]['outPM'];
    $otIn = $data[0]['otIn'];
    $otOut = $data[0]['otOut'];
    $status = 'PENDING';
    $current_date = date('Y-m-d');
    // $compen_date = $_POST['compen'];
    // $time   =   $_POST['time'];
    // $type = $_POST['type'];

    // $date_added = date('Y-m-d', strtotime($compen_date));
    $sql = "INSERT INTO compensatory SET
    employeeno = :empno,
    dateRendered = :compendate,
    inAM = :inam,
    outAM = :outam,
    inPM = :inpm,
    outPM = :outpm,
    otIn = :otin,
    otOut = :otout,
    date_added= :date
    ";


    $check = "SELECT * FROM compensatory WHERE employeeno = :empno AND dateRendered = :compendate";
    $stmt = $con->prepare($check);
    $stmt->execute([
      ':empno'  =>  $empno,
      ':compendate'  =>  $date
    ]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row){
      echo "exist";
      return;
    }
    $stmt = $con->prepare($sql);
    $stmt->execute([
      ':empno'  =>  $empno,
      ':compendate'  =>  $date,
      ':inam'  =>  $inAM,
      ':outam'  =>  $outAM,
      ':inpm'  =>  $inPM,
      ':outpm'  =>  $outPM,
      ':otin'  =>  $otIn,
      ':otout'  =>  $otOut,
      ':date'  =>  $current_date

    ]);
  //check if the insert is successfull
  if($stmt){
    echo "success";
  }



?>