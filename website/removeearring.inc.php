<?php
/*
Xander Faison
10/26/2025
IT-202-005
Phase 2 Assignment: CRUD Categories and Items
xrf@njit.edu
*/
require_once("earring.php");
$earringID = $_POST['earringID'];
$earring = Earring::findEarring($earringID);
$result = $earring->removeEarring();
if ($result)
   echo "<h2>Earring $earringID removed</h2>\n";
else
   echo "<h2>Sorry, problem removing earring $earringID</h2>\n";
?>
