<?php
/*
Xander Faison
10/12/2025
IT-202-005
Phase 1 Assignment: Login and Logout
xrf@njit.edu
*/
session_start();
// Unset all session variables
$_SESSION = array();
// If there's a session cookie, remove it
if (ini_get("session.use_cookies")) {
   $params = session_get_cookie_params();
   setcookie(session_name(), '', time() - 42000,
      $params['path'], $params['domain'],
      $params['secure'], $params['httponly']
   );
}
// Destroy the session
session_destroy();
// Redirect back to home
header("Location: index.php");
exit();
?>
