<?php

    $host = "localhost";
    $db_name = "pmis";
    $username = "root";
    $password = "1234";

    try{

        $con = new PDO("mysql:host=$host; dbname=$db_name", $username, $password);
        //display the enye letter
        $con->exec("set names utf8");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch(PDOEXCEPTION $error){

        echo "Connection Error: " . $error->getMessage();
        
    }


?>