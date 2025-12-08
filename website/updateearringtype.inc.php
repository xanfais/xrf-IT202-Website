<style>
   form[name="earringtype"] {
       display: grid;
       grid-template-columns: 125px 1fr;
       gap: 10px 5px;
       align-items: left;
       max-width: 300px;
       margin: 0px;
   }
   form[name="earringtype"] label {
       text-align: left;
       padding-right: 5px;
   }
   form[name="earringtype"] input[type="text"] {
       width: 100%;
   }
   form[name="earringtype"] input[type="submit"] {
       grid-column: 2;
       justify-self: start;
   }
</style>
<?php
require_once("earringtype.php");
$earringtypeID = $_POST['earringtypeID'];
$earringtype = EarringType::findEarringType($earringtypeID);
if ($earringtype) {
?>
   <h2>Update EarringType <?php echo $earringtypeID; ?></h2><br>
   <form name="earringtype" action="index.php" method="post">
       <label for="earringtypeCode">EarringType Code:</label>
       <input type="text" name="earringtypeCode" id="earringtypeCode" value="<?php echo htmlspecialchars($earringtype->earringtypeCode); ?>">
       <label for="earringtypeName">EarringType Name:</label>
       <input type="text" name="earringtypeName" id="earringtypeName" value="<?php echo htmlspecialchars($earringtype->earringtypeName); ?>">
       <label for="earringStockNumber">Stock Number:</label>
       <input type="text" name="earringStockNumber" id="earringStockNumber" value="<?php echo htmlspecialchars($earringtype->earringStockNumber ?? ''); ?>">
       <input type="submit" name="answer" value="Update EarringType">
       <input type="submit" name="answer" value="Cancel">
       <input type="hidden" name="earringtypeID" value="<?php echo $earringtypeID; ?>">
       <input type="hidden" name="content" value="changeearringtype">
   </form>
<?php
} else {
?>
   <h2>Sorry, category <?php echo $categoryID; ?> not found</h2>
   <a href="index.php?content=listcategories">List Categories</a>
<?php
}
?>
<script language="javascript">
   document.category.categoryCode.focus();
   document.category.categoryCode.select();
</script>