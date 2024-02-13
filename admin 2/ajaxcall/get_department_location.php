<?php 
include('../../config/config.php');
if(isset($_POST['location'])){
    $location = $_POST['location'];
    $sql = "SELECT * from department where location = :location and status = 'Active'";
    $prep = $con->prepare($sql);
    $prep->execute([':location' => $location]);
    $result[] = $prep->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}


?>