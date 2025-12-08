<style>
  /*
Xander Faison
10/12/2025
IT-202-005
Phase 1 Assignment: Login and Logout
xrf@njit.edu
*/
 .login-container {
   max-width: 400px;
   background: linear-gradient(135deg, #fff9f0 0%, #f5f0e8 100%);
   padding: 30px;
   border-radius: 8px;
   box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
   border: 2px solid #d4af37;
 }
 
 form[name="login"] {
   display: grid;
   grid-template-columns: 100px 1fr;
   gap: 15px 10px;
   align-items: center;
 }
 
 form[name="login"] label {
   text-align: right;
   padding-right: 5px;
   color: #2c1810;
   font-weight: 600;
   font-size: 14px;
 }
 
 form[name="login"] input[type="text"],
 form[name="login"] input[type="password"] {
   width: 100%;
   padding: 10px;
   border: 2px solid #d4af37;
   border-radius: 6px;
   background-color: #fffef9;
   color: #2c1810;
   font-size: 13px;
 }
 
 form[name="login"] input[type="text"]:focus,
 form[name="login"] input[type="password"]:focus {
   outline: none;
   box-shadow: 0 0 8px rgba(212, 175, 55, 0.4);
   background-color: #fffef9;
 }
 
 form[name="login"] input[type="submit"] {
   grid-column: 2;
   justify-self: start;
   background: linear-gradient(135deg, #8b4513 0%, #6b3410 100%);
   color: #d4af37;
   padding: 10px 20px;
   border: none;
   border-radius: 6px;
   cursor: pointer;
   font-weight: 600;
   font-size: 14px;
   box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
   transition: all 0.3s ease;
 }
 
 form[name="login"] input[type="submit"]:hover {
   background: linear-gradient(135deg, #6b3410 0%, #4a1f0a 100%);
   color: #f0e68c;
   box-shadow: 0 6px 12px rgba(212, 175, 55, 0.3);
   transform: translateY(-2px);
 }
 
 .welcome-section {
   background: linear-gradient(135deg, #fff9f0 0%, #f5f0e8 100%);
   padding: 30px;
   border-radius: 8px;
   box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
   border-left: 5px solid #d4af37;
 }
 
 .welcome-section h2 {
   color: #8b4513;
   margin-bottom: 20px;
 }
 
 .welcome-section p {
   color: #2c1810;
   margin: 10px 0;
   font-size: 14px;
 }
 
 .warning {
   background-color: #fff3cd;
   border-left: 4px solid #d4af37;
   padding: 10px;
   margin: 15px 0;
   border-radius: 4px;
   color: #6b3410;
   font-weight: 500;
 }
</style>
<?php
if (!isset($_SESSION['login'])) {
?>
  <div class="login-container">
    <h2 style="text-align: center; margin-bottom: 25px; color: #8b4513;">🔐 Manager Login 🔐</h2>
    <form name="login" method="post" action="validate.inc.php">
      <label>Email:</label>
      <input type="text" name="emailAddress" size="20" required placeholder="your@email.com">
      <label>Password:</label>
      <input type="password" name="password" size="20" required placeholder="••••••••">
      <input type="submit" value="Log In">
    </form>
  </div>
<?php
} else {
   $displayName = isset($_SESSION['firstName']) && isset($_SESSION['lastName']) ? "{$_SESSION['firstName']} {$_SESSION['lastName']}" : 'User';
   $pronouns = isset($_SESSION['pronouns']) ? " ({$_SESSION['pronouns']})" : '';
   echo "<div class='welcome-section'>";
   echo "<h2>✨ Welcome to Earring Manager ✨</h2>";
   echo "<p style='font-size: 16px; color: #8b4513; font-weight: 600;'>Hello, $displayName$pronouns</p>";
   echo "<br><p><strong>Earring Shop Inventory Management System</strong></p>";
   echo "<p>Efficiently manage your earring types and inventory. Use the navigation menu on the left to:</p>";
   echo "<ul style='margin: 15px 0; color: #2c1810;'>";
   echo "<li>View and manage earring types</li>";
   echo "<li>Add or update earring inventory</li>";
   echo "<li>Track your collection</li>";
   echo "</ul>";
   echo "<div class='warning'>";
   echo "<strong>⚠️ Important:</strong> Please use the navigation links to navigate the system. Do NOT use browser back/forward buttons!";
   echo "</div>";
   echo "</div>";
}
?>
