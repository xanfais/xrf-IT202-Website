<h2>Enter New EarringType Information</h2>
<form name="newearringtype" action="index.php" method="post">
   <table cellpadding="1" border="0">
       <tr>
           <td>EarringType ID:</td>
           <td><input type="text" name="earringtypeID" size="4"></td>
       </tr>
       <tr>
           <td>EarringType Code:</td>
           <td><input type="text" name="earringtypeCode" size="20"></td>
       </tr>
       <tr>
           <td>EarringType Name:</td>
           <td><input type="text" name="earringtypeName" size="50"></td>
       </tr>
   </table><br>
   <input type="submit" value="Submit New earringtype">
   <input type="hidden" name="content" value="addearringtype">
</form>