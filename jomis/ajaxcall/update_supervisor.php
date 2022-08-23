<?php
include('../../config/config.php');

if(isset($_POST['dept'])){

    $dept = $_POST['dept']; 
    $supervisor = $_POST['supervisor'];


    $callUpdateSupervisor = "CALL spUpdateSupervisor(:dept,:supervisor)";
    $execute = $con->prepare($callUpdateSupervisor);
    $execute->execute([
        ':dept' =>  $dept,
        ':supervisor'  =>$supervisor
    ]);

    echo "Update successful.";
}



?>