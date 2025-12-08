<?php
/*
Xander Faison
10/12/2025
IT-202-005
Phase 1 Assignment: Login and Logout
xrf@njit.edu
*/
ob_start();
session_start();
require_once("earringtype.php");
require_once("earring.php");
?>
<!DOCTYPE html>
<html>
<head>
   <title>Earring Manager</title>
   <link rel="stylesheet" type="text/css" href="ih_styles.css">
   <link rel ="icon" type="image/svg+xml" href="images/logo.svg">
   <script src="realtime.js"></script>
</head>
<body>
   <header>
       <?php include("header.inc.php"); ?>
   </header>
   <section style="display: flex; gap: 0; background-color: rgba(255, 255, 255, 0.5); padding: 5px; border-radius: 0 8px 8px 0;">
       <nav>
           <?php include("nav.inc.php"); ?>
       </nav>
       <main>
           <?php
           if (isset($_REQUEST['content'])) {
               include($_REQUEST['content'] . ".inc.php");
           } else {
               include("main.inc.php");
           }
           ?>
       </main>
        <aside>
           <?php include("aside.inc.php"); ?>
           <script>
               getRealTime();
               setInterval(getRealTime, 5000);
           </script>
        </aside>
   </section>
   <footer>
       <?php include("footer.inc.php"); ?>
   </footer>
</body>
</html>
<?php
ob_end_flush();
?>