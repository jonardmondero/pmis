<?php
// Location to file
$db = 'C:\xampp\htdocs\att2000.mdb';
if(!file_exists($db)){
 die('Error finding access database');
}
// Connection to ms access
$conn = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=".$db.";Uid=; Pwd=;");



