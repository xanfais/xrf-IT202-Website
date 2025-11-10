<?php
/*
Xander Faison
10/31/2025
IT-202-005
Phase 3 Assignment: HTML Website Layout
xrf@njit.edu
*/
if (!isset($_REQUEST['earringtypeID']) or (!is_numeric($_REQUEST['earringtypeID']))) {
?>
 <h2>You did not select a valid earringtypeID to view.</h2>
 <a href="index.php?content=listearringstype">List earringstype</a>
 <?php
} else {
 $earringtypeID = $_REQUEST['earringtypeID'];
 $earringtype = EarringType::findEarringType($earringtypeID);
 if ($earringtype) {
   echo $earringtype;
   // get earrings for this type from the Earring class
   $earrings = Earring::getEarringsByEarringType($earringtypeID);
   if ($earrings) {
 ?>
     <br><br>
     <b>Earring:</b><br>
     <table>
       <tr>
         <th>Earring</th>
         <th>Name</th>
         <th>Price</th>
       </tr>
       <?php
       $earringtotal = 0;
       foreach ($earrings as $earring) {
       ?>
         <tr>
          <td><?php echo $earring->earringID; ?></td>
          <td><?php echo htmlspecialchars($earring->earringName); ?></td>
          <td><?php echo number_format($earring->listPrice, 2); ?></td>
         </tr>
       <?php
         $earringtotal = $earringtotal + $earring->listPrice;
       }
       ?>
       <tr>
         <td></td>
         <td>Total</td>
        <td><?php echo '$' . number_format($earringtotal, 2); ?></td>
       </tr>
     </table>
<?php
   } else {
     echo "<h2>There are no earrings for this earringtype</h2>\n";
   }
 } else {
   echo "<h2>Sorry, earringtype $earringtypeID not found</h2>\n";
 }
}
?>