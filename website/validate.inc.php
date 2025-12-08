<?php
/*
Xander Faison
10/12/2025
IT-202-005
Phase 1 Assignment: Login and Logout
xrf@njit.edu
*/
error_log("\$_POST " . print_r($_POST, true));
session_start();
require_once('database.php');
$emailAddress = htmlspecialchars($_POST['emailAddress'] ?? '');
$password = $_POST['password'] ?? '';
if (filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
  $query = "SELECT emailAddress, firstName, lastName, pronouns FROM EarringManagers " .
    "WHERE emailAddress = ? AND password = SHA2(?,256)";
  $db = getDB();
  $stmt = $db->prepare($query);
  $stmt->bind_param("ss", $emailAddress, $password);
  $stmt->execute();
  $stmt->bind_result($dbEmail, $firstName, $lastName, $pronouns);
  $fetched = $stmt->fetch();
  $db->close();
  if ($fetched) {
    $_SESSION['login'] = true;
    $_SESSION['emailAddress'] = $dbEmail;
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    $_SESSION['pronouns'] = $pronouns;
    header("Location: index.php");
    exit();
    } else {
      echo "<h2>Sorry, login incorrect</h2>\n";
      echo "<a href=\"index.php\">Please try again</a>\n";
    }
} else {
  echo "<h2>Please enter a valid email address</h2>\n";
  echo "<a href=\"index.php\">Please try again</a>\n";
}
?>
