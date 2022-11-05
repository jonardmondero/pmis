<?php

    // $host = "localhost";
    // $db_name = "pmis";
    // $username = "root";
    // $password = "admin";


// @hrm8ioMetrics -- HRM SERVER PASSWORD
    try{

        $mscon = new PDO("sqlsrv:server=DESKTOP-IFKJ37A\SQLEXPRESS;Database=zktime;ConnectionPooling=0", "", "");
        //display the enye letter
        $mscon->exec("set names utf8");
        $mscon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch(PDOEXCEPTION $error){

        echo "Connection Error: " . $error->getMessage();
        
    }


?>