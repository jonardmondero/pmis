<?php 
include_once('../../config/config.php');
if(isset($_POST['entryno'])) {
    $id = $_POST['entryno'];
    $delete_ob = "DELETE FROM officialbusiness WHERE entryId = :id";
    $prep_delete = $con->prepare($delete_ob);
    $prep_delete->execute([
        ':id' => $id
    ]);
    if($prep_delete->rowCount() > 0) {
        echo "success";
    } else {
        echo "failed";
    }
}

?>