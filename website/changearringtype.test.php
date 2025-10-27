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
$earringtype->earringtypeID = $_POST['earringtypeID'];
$earringtype->earringtypeCode = $_POST['earringtypeCode'];
$earringtype->earringtypeName = $_POST['earringtypeName'];
$result = $earringtype->updateEarringType();
if ($result) {
   echo "<h2>earringtype $earringtypeID updated</h2>\n";
} else {
   echo "<h2>Problem updating earringtype $earringtypeID</h2>\n";
}
?>