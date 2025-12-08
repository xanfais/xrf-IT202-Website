<?php
/*
Xander Faison
10/26/2025
IT-202-005
Phase 2 Assignment: CRUD Categories and Items
xrf@njit.edu
*/
require_once("earringtype.php");
if (isset($_SESSION['login'])) {
   $earringtypeID = filter_input(INPUT_POST, 'earringtypeID', FILTER_VALIDATE_INT);
   if ((trim($earringtypeID) == '') or (!is_int($earringtypeID))) {
       echo "<h2>Sorry, you must enter a valid earringtype ID number</h2>\n";
   } else if (EarringType::findEarringType($earringtypeID)) {
       echo "<h2>Sorry, that earringtype ID number #$earringtypeID is already in use</h2>\n";
   } else {
       $earringtypeCode = htmlspecialchars($_POST['earringtypeCode']);
       $earringtypeName = htmlspecialchars($_POST['earringtypeName']);
       $earringStockNumber = htmlspecialchars($_POST['earringStockNumber'] ?? '');
       $earringtype = new EarringType($earringtypeID, $earringtypeCode, $earringtypeName);
       $earringtype->earringStockNumber = $earringStockNumber;
       $result = $earringtype->saveEarringType();
       if ($result)
           echo "<h2>New EarringType #$earringtypeID successfully added</h2>\n";
       else
           echo "<h2>Sorry, there was a problem adding that earringtype</h2>\n";
   }
} else {
   echo "<h2>Please log in first</h2>\n";
}
?>