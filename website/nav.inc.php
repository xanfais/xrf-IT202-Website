  <?php
  /*
Xander Faison
10/31/2025
IT-202-005
Phase 3 Assignment: HTML Website Layout
xrf@njit.edu
*/
   if (isset($_SESSION['login'])) {
   ?>
    <div class="navigation" style="float: left; height: 100%; min-width: 175px; width: auto;">
      <table width="100%" cellpadding="3">
        <?php
         echo "<td><h3>Welcome, {$_SESSION['login']}</h3></td>";
         ?>
        <tr>
          <td><a href="index.php"><strong>Home</strong></a></td>
        </tr>
        <tr>
          <td><strong>EarringType</strong></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listearringstype">
              <strong>List EarringType</strong></a></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newearringtype">
              <strong>Add New EarringType</strong></a></td>
        </tr>
        <tr>
          <td><strong>Earrings</strong></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listearrings">
              <strong>List Earrings</strong></a></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newearring">
              <strong>Add New Earring</strong></a></td>
        </tr>
        <tr>
          <td>
            <hr />
          </td>
        </tr>
        <tr>
          <td><a href="index.php?content=logout">
              <strong>Logout</strong></a></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
            <form action="index.php" method="post">
              <label>Search for Earring:</label><br>
              <input type="text" name="earringID" size="14" />
              <input type="submit" value="find" />
              <input type="hidden" name="content" value="updateearring" />
            </form>
          </td>
        </tr>
        <tr>
          <td>
            <form action="index.php" method="post">
              <label>Search for EarringType:</label><br>
              <input type="text" name="earringtypeID" size="14" />
              <input type="submit" value="find" />
              <input type="hidden" name="content" value="displayearringtype" />
            </form>
          </td>
        </tr>
      </table>
    </div>
  <?php
   }
   ?>