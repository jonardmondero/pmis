<?php include ('../../config/config.php');
if(isset($_POST['employeeno'])) {
$datefrom = $_POST['dtfr'];
$empno = $_POST['employeeno'];
$dateto = $_POST['dtto'];
$leave_status = $_POST['leave_status'];
$select_travel = "SELECT * FROM leaveentry WHERE EmployeeNo = :empno  AND dateFrom BETWEEN :datefrom AND  :dateto  AND  status = :status";
$prep_select=$con->prepare($select_travel);
$prep_select->execute([
    ':empno' => $empno,
':datefrom' => $datefrom,
':dateto' => $dateto,
':status' => $leave_status,
]);
while( $ledgerresult = $prep_select->fetch(PDO::FETCH_ASSOC)) {
  

        echo '<tr>';
        echo '<td>';
        echo $ledgerresult['entryId'];
        echo '</td>';
        echo '<td>';
        echo $ledgerresult['dateFrom'];
        echo '</td>';
        echo '<td>';
        echo $ledgerresult['dateTo'];
        echo '</td>';
        echo '<td>';
        echo $ledgerresult['leaveType'];
        echo '</td>';
        echo '<td>';
        echo $ledgerresult['duration'];
        echo '</td>';
        echo '<td>';
        echo $ledgerresult['status'];
        echo '</td>'; 
        echo '<td>';
       echo ' <button class = "btn btn-primary btn-md btn-circle btn__leave" id = "btn-leave" data-id='.$ledgerresult['employeeNo'].' > <i class = "fa fa-upload"></i></button>';
       echo ' <button class = "btn btn-danger btn-md btn-circle btn_delete" id = "btn-delete_leave" data-id='.$ledgerresult['employeeNo'].' > <i class = "fa fa-trash"></i></button>' ; 
       echo '</td>';   
        echo '</tr>';
    }
     
}


?>