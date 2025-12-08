<?php
/*
Xander Faison
10/31/2025
IT-202-005
Phase 3 Assignment: HTML Website Layout
xrf@njit.edu
*/
if (!isset($_REQUEST['earringID']) or (!is_numeric($_REQUEST['earringID']))) {
?>
 <h2>You did not select a valid earringID to view.</h2>
 <a href="index.php?content=listearrings">List Earrings</a>
 <?php
} else {
 require_once("earring.php");
 $earringID = $_REQUEST['earringID'];
 $earring = Earring::findEarring($earringID);
 if ($earring) {
 ?>
   <h2>Earring ID: <?php echo $earring->earringID; ?></h2>
   <h2>Earring Name: <?php echo htmlspecialchars($earring->earringName); ?></h2>
   <h2>Earring Price: <?php echo number_format($earring->listPrice, 2); ?></h2>
   <br>
<?php
 } else {
   echo "<h2>Sorry, earring not found.</h2>\n";
 }
}
?>
