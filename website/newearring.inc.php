<h2>Enter New Earring Information</h2>
<form name="newearring" action="index.php" method="post">
   <table cellpadding="1" border="0">
       <tr>
           <td>earring ID:</td>
           <td><input type="text" name="earringID" size="4"></td>
       </tr>
       <tr>
           <td>Name:</td>
           <td><input type="text" name="earringName" size="20"></td>
       </tr>
       <tr>
           <td>EarringType ID:</td>
           <td><input type="text" name="earringtypeID" size="4"></td>
       </tr>
       <tr>
           <td>List Price:</td>
           <td><input type="text" name="listPrice" size="10"></td>
       </tr>
   </table><br>
   <input type="submit" value="Submit New Earring">
   <input type="hidden" name="content" value="addearring">
</form>