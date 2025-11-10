<?php
/*
Xander Faison
10/26/2025
IT-202-005
Phase 2 Assignment: CRUD Categories and Items
xrf@njit.edu
*/
error_log("\$_POST " . print_r($_POST, true));
require_once("earringtype.php");
$earringTypeID = $_POST['earringtypeID'];
$earringType = EarringType::findEarringType($earringTypeID);
$result = $earringType->removeEarringType();
if ($result)
   echo "<h2>EarringType $earringTypeID removed</h2>\n";
else
   echo "<h2>Sorry, problem removing earringtype $earringTypeID</h2>\n";
?>
