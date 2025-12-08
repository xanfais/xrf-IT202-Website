/*
Xander Faison
10/31/2025
IT-202-005
Phase 3 Assignment: HTML Website Layout
xrf@njit.edu
*/
<style>
   footer {
      background: linear-gradient(135deg, #1a0f0a 0%, #2c1810 100%);
      color: #d4af37;
      text-align: center;
      padding: 20px;
      border-top: 3px solid #d4af37;
      font-size: 12px;
      line-height: 1.8;
   }
   
   footer p {
      margin: 5px 0;
      color: #f5f0e8;
   }
   
   footer p:first-child {
      color: #d4af37;
      font-weight: 600;
      font-size: 13px;
      margin-bottom: 10px;
   }
</style>
<p>✨ Earring Shop - Premium Inventory Management ✨</p>
<p>Xander Faison | IT202-05 | Internet Applications | xrf@njit.edu</p>
<p>
   <?php
   date_default_timezone_set("America/New_York");
   echo "Last updated: " . date("D M j, h:ia T");
   ?>
</p>