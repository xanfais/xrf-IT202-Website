<?php
/*
Xander Faison
10/26/2025
IT-202-005
Phase 2 Assignment: CRUD Categories and Items
xrf@njit.edu
*/
 require_once('earring.php');
if (isset($_SESSION['login'])) {
   $earringID = $_POST['earringID'];
   if ((trim($earringID) == '') or (!is_numeric($earringID))) {
       echo "<h2>Sorry, you must enter a valid earring ID number</h2>\n";
   } else {
       $earringName = $_POST['earringName'];
       $categoryID = $_POST['categoryID'];
       $listPrice = $_POST['listPrice'];
       $earring = new Earring($earringID, $earringName, $categoryID, $listPrice);
       $result = $earring->saveEarring();
       if ($result)
           echo "<h2>New earring #$earringID successfully added</h2>\n";
       else
           echo "<h2>Sorry, there was a problem adding that earring</h2>\n";
   }
} else {
   echo "<h2>Please login first</h2>\n";
}
?>