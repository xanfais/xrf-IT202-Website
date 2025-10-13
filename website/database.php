<?php
/*
Xander Faison
10/12/2025
IT-202-005
Phase 1 Assignment: Login and Logout
xrf@njit.edu
*/
 function getDB() {
   $host = 'sql1.njit.edu';
   $port = 3306;
   $dbname = 'xrf';
   $username = 'xrf';
   $password = 'Gr0undsk33per!';
   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   try {
       $db = new mysqli($host, $username, $password, $dbname, $port);
       error_log("You are connected to the $host database!");
       // echo "You are connected to the $host database!";
       return $db;
   } catch (mysqli_sql_exception $e) {
       error_log($e->getMessage(), 0);
       // echo $e->getMessage();
   }
 }
 // getDB();
?>
