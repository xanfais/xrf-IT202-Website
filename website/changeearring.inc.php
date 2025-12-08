<?php
/*
Xander Faison
10/26/2025
IT-202-005
Phase 2 Assignment: CRUD Categories and Items
xrf@njit.edu
*/
require_once("earring.php");
if (isset($_SESSION['login'])) {
   $earringID = $_POST['earringID'];
   $answer = $_POST['answer'];
   if ($answer == "Update earring") {
      $earring = Earring::findEarring($earringID);
      $earring->earringID = $_POST['earringID'];
      $earring->earringName = $_POST['earringName'];
      $earring->earringtypeID = $_POST['earringtypeID'];
      $earring->listPrice = $_POST['listPrice'];
      $result = $earring->updateEarring();
      if ($result) {
         echo "<h2>Earring $earringID updated</h2>\n";
      } else {
         echo "<h2>Problem updating earring $earringID</h2>\n";
      }
   } else {
      echo "<h2>Update cancelled</h2>\n";
   }
} else {
   echo "<h2>Please log in first.</h2>\n";
}
?>
