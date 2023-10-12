<?php

    // $host = "localhost";
    // $db_name = "pmis";
    // $username = "root";
    // $password = "admin";

    // $serverName = "DESKTOP-I3UJM8B\SQLEXPRESS";
    // $connectionOptions = array(
    //     "Database" => "zktime",
    //     "Uid" => "",
    //     "PWD" => ""
    // );

// @hrm8ioMetrics -- HRM SERVER PASSWORD
    try{
        // $mscon = sqlsrv_connect($serverName, $connectionOptions);;
        // $mscon = new PDO("sqlsrv:server=DESKTOP-MA6ABEO\SQLEXPRESS;Database=zktime;ConnectionPooling=1;MultipleActiveResultSets=true", "", "");
        
        $mscon = new PDO("sqlsrv:server=DESKTOP-I3UJM8B\SQLEXPRESS;Database=zktime;ConnectionPooling=1;MultipleActiveResultSets=true", "", "");
        //display the enye letter
        $mscon->exec("set names utf8");
        $mscon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch(PDOEXCEPTION $error){

        echo "Connection Error: " . $error->getMessage();
        
    }


?>