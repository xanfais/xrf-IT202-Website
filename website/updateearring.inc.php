<?php
/*
Xander Faison
10/31/2025
IT-202-005
Phase 3 Assignment: HTML Website Layout
xrf@njit.edu
*/
if (!isset($_POST['earringID']) or (!is_numeric($_POST['earringID']))) {
?>
   <h2>You did not select a valid earringID value</h2>
   <a href="index.php?content=listearrings">List earrings</a>
   <?php
} else {
   require_once("earring.php");
   $earringID = $_POST['earringID'];
   $earring = Earring::findEarring($earringID);
   if ($earring) {
   ?>
       <h2>Update Earring <?php echo $earring->earringID; ?></h2><br>
       <form name="earrings" action="index.php" method="post">
           <table>
               <tr>
                   <td>earringID</td>
                   <td><?php echo $earring->earringID; ?></td>
               </tr>
               <tr>
                   <td>Name</td>
                   <td><input type="text" name="earringName" value="<?php echo $earring->earringName; ?>"></td>
               </tr>
               <tr>
                   <td>EarringType ID</td>
               <td><input type="text" name="earringtypeID" value="<?php echo $earring->earringtypeID; ?>"></td>
               </tr>
               <tr>
                   <td>List Price</td>
                 <td><input type="text" name="listPrice" value="<?php echo $earring->listPrice; ?>"></td>
               </tr>
           </table><br><br>
           <input type="submit" name="answer" value="Update earring">
           <input type="submit" name="answer" value="Cancel">
           <input type="hidden" name="earringID" value="<?php echo $earringID; ?>">
           <input type="hidden" name="content" value="changeearring">
       </form>
   <?php
   } else {
   ?>
       <h2>Sorry, earring <?php echo $earringID; ?> not found</h2>
       <a href="index.php?content=listearrings">List earrings</a>
<?php
   }
}
?>