<?php
/*
Xander Faison
10/26/2025
IT-202-005
Phase 2 Assignment: CRUD Categories and Items
xrf@njit.edu
*/
require_once('database.php');
class EarringType
{
   public $earringtypeID;
   public $earringtypeCode;
   public $earringtypeName;
    public $earringStockNumber;
   function __construct($earringtypeID, $earringtypeCode, $earringtypeName)
   {
       $this->earringtypeID = $earringtypeID;
       $this->earringtypeCode = $earringtypeCode;
       $this->earringtypeName = $earringtypeName;
   }
   function __toString()
   {
       $output = "<h2>earringtype Number: $this->earringtypeID</h2>\n" .
           "<h2>$this->earringtypeCode, $this->earringtypeName</h2>\n";
       return $output;
   }
   function saveEarringType()
   {
       $db = getDB();
       // Table created in scripts uses EarringTypes (singular 'EarringTypes')
       // Insert explicit columns; EarringStockNumber may be an empty string by default
       $query = "INSERT INTO EarringTypes (EarringTypeID, EarringTypeCode, EarringTypeName, EarringStockNumber) VALUES (?, ?, ?, ?)";
       $stmt = $db->prepare($query);
       $stock = isset($this->earringStockNumber) ? $this->earringStockNumber : '';
       $stmt->bind_param(
           "isss",
           $this->earringtypeID,
           $this->earringtypeCode,
           $this->earringtypeName,
           $stock
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
        static function getEarringsType()
   {
       $db = getDB();
       $query = "SELECT * FROM EarringTypes";
       $result = $db->query($query);
       if (mysqli_num_rows($result) > 0) {
           $earringTypes = array();
           while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
               $earringtype = new EarringType(
                   $row['EarringTypeID'],
                   $row['EarringTypeCode'],
                   $row['EarringTypeName']
               );
               // populate optional stock number if present
               if (isset($row['EarringStockNumber'])) {
                   $earringtype->earringStockNumber = $row['EarringStockNumber'];
               }
               array_push($earringTypes, $earringtype);
           }
           $db->close();
           return $earringTypes;
       } else {
           $db->close();
           return NULL;
       }
   }
   static function findEarringType($earringtypeID)
   {
       $db = getDB();
       $query = "SELECT * FROM EarringTypes WHERE EarringTypeID = $earringtypeID";
       $result = $db->query($query);
       $row = $result->fetch_array(MYSQLI_ASSOC);
       if ($row) {
           $earringtype = new EarringType(
               $row['EarringTypeID'],
               $row['EarringTypeCode'],
               $row['EarringTypeName']
           );
           if (isset($row['EarringStockNumber'])) {
               $earringtype->earringStockNumber = $row['EarringStockNumber'];
           }
           $db->close();
           return $earringtype;
       } else {
           $db->close();
           return NULL;
       }
   }
   function updateEarringType()
   {
       $db = getDB();
       $query = "UPDATE EarringTypes SET EarringTypeCode = ?, EarringTypeName = ?, EarringStockNumber = ? WHERE EarringTypeID = $this->earringtypeID";
        $stmt = $db->prepare($query);
        $stmt->bind_param(
           "sss",
           $this->earringtypeCode,
           $this->earringtypeName,
           $this->earringStockNumber
        );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
   function removeEarringType()
   {
       $db = getDB();
       $query = "DELETE FROM EarringTypes WHERE EarringTypeID = $this->earringtypeID";
       $result = $db->query($query);
       $db->close();
       return $result;
   }
}
?>
