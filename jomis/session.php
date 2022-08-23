<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$user_type = $_SESSION['usertype'];

if($user_type == 'User'){
    header('location:../index.php');
}

if (!isset($_SESSION['id'])) {
    header('location:../index.php');
}

?>