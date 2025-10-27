<?php
/*
Xander Faison
10/26/2025
IT-202-005
Phase 2 Assignment: CRUD Categories and Items
xrf@njit.edu
*/
require_once("earringtype.php");
$earringstype = EarringType::getEarringsType();
if ($earringstype) {
?>
 <h2>Select earringstype</h2>
  <form name="earringstype" method="post">
   <select name="earringtypeID" size="20">
       <?php
       foreach ($earringstype as $earringtype) {
           $earringtypeID = $earringtype->earringtypeID;
           $name = $earringtypeID . " - " . $earringtype->earringtypeCode . ", " . $earringtype->earringtypeName;
           echo "<option value=\"$earringtypeID\">$name</option>\n";
       }
       ?>
   </select>
  </form>
<?php
} else {
  echo "<h2>No earringstype found.</h2>";
}
?>