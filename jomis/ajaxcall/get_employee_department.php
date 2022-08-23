<?php 

include('./config/config.php');
$columns= array( 
    // datatable column index  => database column name
        0 =>  'entity_no', 
        1 => 'username',
        2 => 'fullname',
        3 => 'status',
    
    );
    $dept = $_POST['department'];

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$getAllIndividual = "SELECT ID,
                     CONCAT(EmpLname,', ',EmpFname,', ',LEFT(EmpMname,1),'.') as fullName
                      FROM employeedetail where EmpDept LIKE %:dept% 
                      order by EmpDept LIMIT ".$requestData['start']." ,".$requestData['length']."  ";

$getIndividualData = $con->prepare($getAllIndividual);
$getIndividualData->execute([
	':dept' =>$dept,
]);                   


$countNoFilter = "SELECT COUNT(ID) as id from employeedetail";
                $getrecordstmt = $con->prepare($countNoFilter);
                $getrecordstmt->execute() or die("get_employee_department.php");
$getrecord = $getrecordstmt->fetch(PDO::FETCH_ASSOC);
$totalData = $getrecord['id'];

$totalFiltered = $totalData;  
// when there is no search parameter then total number rows = total number filtered rows.


$getAllIndividual = "SELECT ID,
CONCAT(EmpLname,', ',EmpFname,', ',LEFT(EmpMname,1),'.') as fullName
 FROM employeedetail where EmpDept LIKE %:dept% AND ";
             
     if( !empty($requestData['search']['value']) ) {
        $getAllIndividual.=" (EmpFname LIKE '%".$requestData['search']['value']."%'";
        $getAllIndividual.=" OR EmpMname LIKE '%".$requestData['search']['value']."%' ";
        $getAllIndividual.=" OR EmpLname LIKE '%".$requestData['search']['value']."%' ";
        $getAllIndividual.=" OR CONCAT(EmpFname,' ',EmpMname,' ',EmpLname) LIKE '%" . $requestData['search']['value'] . "%' ";
        $getAllIndividual.=" OR biometricId LIKE '%".$requestData['search']['value']."%') ";
        $getAllIndividual.=" order by EmpLname LIMIT ".$requestData['start']." ,".$requestData['length']." ";
        $getIndividualData = $con->prepare($getAllIndividual);
        $getIndividualData->execute([
            ':dept' =>$dept
        ]); 

     $countfilter = "SELECT COUNT(ID) as id from employeedetail 
     where EmpDept LIKE %:dept%  AND ";
      $countfilter.=" (EmpFname LIKE '%".$requestData['search']['value']."%'";
      $countfilter.=" OR EmpMname LIKE '%".$requestData['search']['value']."%' ";
      $countfilter.=" OR EmpLname LIKE '%".$requestData['search']['value']."%' ";
      $countfilter.=" OR CONCAT(EmpFname,' ',EmpMname,' ',EmpLname) LIKE '%" . $requestData['search']['value'] . "%' ";
      $countfilter.=" OR biometricId LIKE '%".$requestData['search']['value']."%') ";
      $countfilter.=" LIMIT ".$requestData['start']." ,".$requestData['length']." ";

        $getrecordstmt = $con->prepare($countfilter);
        $getrecordstmt->execute([

            ':dept' =>$dept,
        ]) or die("get_employee_department.php");
        $getrecord1 = $getrecordstmt->fetch(PDO::FETCH_ASSOC);
        $totalData = $getrecord['id'];
        $totalFiltered = $totalData;
     }

     $data = array();
// while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	while ($row = $getIndividualData->fetch(PDO::FETCH_ASSOC)){
	$nestedData=array(); 
	$nestedData[] = $row["employeeNo"];
    $nestedData[] = $row["fullName"];

	$data[] = $nestedData;
}
        $json_data = array(
    "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
    "recordsTotal"    => intval( $totalData ),  // total number of records
    "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
    "data"            => $data   // total data array
    );

    echo json_encode($json_data);  // send data as json format



?>