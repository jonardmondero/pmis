<?php

    // $host = "localhost";
    // $db_name = "pmis";
    // $username = "root";
    // $password = "admin";
// @hrm8ioMetrics -- HRM SERVER PASSWORD
    try{

        $mscon = $db = new PDO("sqlsrv:Server=PC-48\SQLEXPRESS;Database=zktime", "", "");
        //display the enye letter
        $mscon->exec("set names utf8");
        $mscon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch(PDOEXCEPTION $error){

        echo "Connection Error: " . $error->getMessage();
        
    }


?>