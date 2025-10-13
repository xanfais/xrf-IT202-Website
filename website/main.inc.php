<?php
/*
Xander Faison
10/12/2025
IT-202-005
Phase 1 Assignment: Login and Logout
xrf@njit.edu
*/
if (!isset($_SESSION['login'])) {
?>
  <h2>Please log in to the Earring Shop Material Website</h2><br>
  <form name="login" action="index.php" method="post">
    <label>Email:</label>
    <input type="text" name="emailAddress" size="20">
    <br>
    <br>
    <label>Password:</label>
    <input type="password" name="password" size="20">
    <br>
    <br>
    <input type="submit" value="Login">
    <input type="hidden" name="content" value="validate">
  </form>
<?php
} else {
  $first = isset($_SESSION['firstName']) ? $_SESSION['firstName'] : '';
  $last = isset($_SESSION['lastName']) ? $_SESSION['lastName'] : '';
  $pronouns = isset($_SESSION['pronouns']) ? " (" . $_SESSION['pronouns'] . ")" : '';
  echo "<h2>Welcome $first $last$pronouns</h2>";
?>
   <br><br>
   <p>This program tracks category and item inventory</p>
   <p>Please use the links in the navigation window</p>
   <p>Please DO NOT use the browser navigation buttons!</p>
   <a href="index.php?content=logout"><strong>Logout</strong></a>
<?php
}
?>
 