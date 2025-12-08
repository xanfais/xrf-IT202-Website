<script language="javascript">
   function listbox_dblclick() {
       document.earringtypes.displayearringtype.click()
   }
   function button_click(target) {
       var userConfirmed = true;
       if (target == 1) {
           userConfirmed = confirm("Are you sure you want to remove this earringtype?");
       }
       if (userConfirmed) {
           if (target == 0) earringtypes.action = "index.php?content=displayearringtype";
           if (target == 1) earringtypes.action = "index.php?content=removeearringtype";
           if (target == 2) earringtypes.action = "index.php?content=updateearringtype";
       } else {
           alert("Action canceled.");
       }
   }
</script>
<?php
/*
Xander Faison
10/26/2025
IT-202-005
Phase 2 Assignment: CRUD Categories and Items
xrf@njit.edu
*/
require_once("earringtype.php");
$earringtypes = EarringType::getEarringsType();
if ($earringtypes) {
?>
 <h2>Select EarringType</h2>
  <form name="earringtypes" method="post">
   <select ondblclick="listbox_dblclick()" name="earringtypeID" size="20">
       <?php
       foreach ($earringtypes as $earringtype) {
           $earringtypeID = $earringtype->earringtypeID;
           $name = $earringtypeID . " - " . $earringtype->earringtypeCode . ", " . $earringtype->earringtypeName;
           echo "<option value=\"$earringtypeID\">$name</option>\n";
       }
       ?>
   </select>
   <br>
   <input type="submit" onClick="button_click(0)" name="displayearringtype" value="View EarringType">
   <input type="submit" onClick="button_click(1)" name="deleteearringtype" value="Delete EarringType">
   <input type="submit" onClick="button_click(2)" name="updateearringtype" value="Update EarringType">
  </form>
<?php
} else {
  echo "<h2>No earringtypes found.</h2>";
}
?>