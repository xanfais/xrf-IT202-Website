<?php
/*
Xander Faison
10/26/2025
IT-202-005
Phase 2 Assignment: CRUD Categories and Items
xrf@njit.edu
*/
require_once("earring.php");
$earrings = Earring::getEarrings();
if ($earrings) {
?>
 <h2>Select earring</h2>
  <form name="earrings" method="post">
   <select name="earringID" size="20">
       <?php
       foreach ($earrings as $earring) {
           $earringID = $earring->earringID;
           $earringName = $earring->earringName;
           $earringPrice = $earring->listPrice;
           $option = $earringID . " - " . $earringName .  " - " . $earringPrice;
           echo "<option value=\"$earringID\">$option</option>\n";
       }
       ?>
   </select>
 </form>
<?php
} else {
  echo "<h2>No earrings found.</h2>";
}
?>