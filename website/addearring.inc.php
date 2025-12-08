<?php
/*
Xander Faison
10/26/2025
IT-202-005
Phase 2 Assignment: CRUD Categories and Items
xrf@njit.edu
 */
require_once("earring.php");
require_once("earringtype.php");
if (isset($_SESSION['login'])) {
   $earringID = filter_input(INPUT_POST, 'earringID', FILTER_VALIDATE_INT);
   if ((trim($earringID) == '') or (!is_int($earringID))) {
       echo "<h2>Sorry, you must enter a valid earring ID number</h2>\n";
   } else if (Earring::findEarring($earringID)) {
       echo "<h2>Sorry, that earring ID number #$earringID is already in use</h2>\n";
   } else {
       $earringName = htmlspecialchars($_POST['earringName']);
       $earringtypeID = filter_input(INPUT_POST, 'earringtypeID', FILTER_VALIDATE_INT);
       $listPrice = filter_input(INPUT_POST, 'listPrice', FILTER_VALIDATE_FLOAT);
       $earring = new Earring($earringID, $earringName, $earringtypeID, $listPrice);
       $result = $earring->saveEarring();
       if ($result)
           echo "<h2>New Earring #$earringID successfully added</h2>\n";
       else
           echo "<h2>Sorry, there was a problem adding that earring</h2>\n";
   }
} else {
   echo "<h2>Please log in first</h2>\n";
}
?>