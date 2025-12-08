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
   $earringtypeID = $_POST['earringtypeID'];
   $answer = $_POST['answer'];
   if ($answer == "Update EarringType") {
      $earringtype = EarringType::findEarringType($earringtypeID);
      $earringtype->earringtypeID = $_POST['earringtypeID'];
      $earringtype->earringtypeCode = $_POST['earringtypeCode'];
      $earringtype->earringtypeName = $_POST['earringtypeName'];
      $earringtype->earringStockNumber = $_POST['earringStockNumber'] ?? '';
      $result = $earringtype->updateEarringType();
      if ($result) {
         echo "<h2>EarringType $earringtypeID updated</h2>\n";
      } else {
         echo "<h2>Problem updating earringtype $earringtypeID</h2>\n";
      }
   } else {
      echo "<h2>Update cancelled</h2>\n";
   }
} else {
   echo "<h2>Please log in first.</h2>\n";
}
?>
