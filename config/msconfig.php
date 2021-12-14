<?php
// Location to file
$db = 'C:\xampp\htdocs\pmis\att2000.mdb';
// $db = '//192.168.0.45\JAP Softwares\ATT2000(MAIN).mdb';
if(!file_exists($db)){
 die('Error finding access database');
}
// Connection to ms access
$conn = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=".$db.";Uid=; Pwd=;");



