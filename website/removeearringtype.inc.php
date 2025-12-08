<?php
/*
Xander Faison
10/26/2025
IT-202-005
Phase 2 Assignment: CRUD Categories and Items
xrf@njit.edu
*/
require_once("earringtype.php");
$earringtypeID = $_POST['earringtypeID'];
$earringtype = EarringType::findEarringType($earringtypeID);
$result = $earringtype->removeEarringType();
if ($result)
   echo "<h2>EarringType $earringtypeID removed</h2>\n";
else
   echo "<h2>Sorry, problem removing earringtype $earringtypeID</h2>\n";
?>
