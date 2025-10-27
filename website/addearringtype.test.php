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
   if ((trim($earringtypeID) == '') or (!is_numeric($earringtypeID))) {
       echo "<h2>Sorry, you must enter a valid earringtype ID number</h2>\n";
   } else {
       $earringtypeCode = $_POST['earringtypeCode'];
       $earringtypeName = $_POST['earringtypeName'];
       $earringtype = new EarringType($earringtypeID, $earringtypeCode, $earringtypeName);
       $result = $earringtype->saveEarringType();
       if ($result)
           echo "<h2>New earringtype #$earringtypeID successfully added</h2>\n";
       else
           echo "<h2>Sorry, there was a problem adding that earringtype</h2>\n";
   }
} else {
   echo "<h2>Please log in first</h2>\n";
}
?>