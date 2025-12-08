<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
 function listbox_dblclick() {
   $('input[name="displayitem"]').trigger('click');
 }


 function button_click(target) {
   var userConfirmed = true;
   if (target == 1) {
     userConfirmed = confirm("Are you sure you want to remove this earring?");
   }
   if (userConfirmed) {
     var $form = $('form[name="earrings"]');
     if (target == 0) $form.attr('action', 'index.php?content=displayearring');
     if (target == 1) $form.attr('action', 'index.php?content=removeearring');
     if (target == 2) $form.attr('action', 'index.php?content=updateearring');
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
require_once("earring.php");
$earrings = Earring::getEarrings();
if ($earrings) {
?>
<h2>Select Earring</h2>
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
  <br>
  <input type="submit" name="displayearring" value="View Earring">
  <input type="submit" name="deleteearring" value="Delete Earring">
  <input type="submit" name="updateearring" value="Update Earring">
 </form>
<?php
} else {
 echo "<h2>No earrings found.</h2>";
}
?>
<script>
 jQuery(document).ready(function() {
   $('select[name="earringID"]').on('dblclick', listbox_dblclick);
   $('input[name="displayearring"]').on('click', function() {
     button_click(0);
   });
   $('input[name="deleteearring"]').on('click', function() {
     button_click(1);
   });
   $('input[name="updateearring"]').on('click', function() {
     button_click(2);
   });
 });
 function selectFirstEarring() {
   var $select = $('select[name="earringID"]');
   if ($select.length && $select[0].options.length > 0) {
     $select.prop('selectedIndex', 0);
   }
 }
 selectFirstEarring();
</script>