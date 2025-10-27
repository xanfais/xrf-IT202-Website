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
       $query = "INSERT INTO EarringsTypes VALUES (?, ?, ?)";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "iss",
           $this->earringtypeID,
           $this->earringtypeCode,
           $this->earringtypeName
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
        static function getEarringsType()
   {
       $db = getDB();
       $query = "SELECT * FROM EarringsTypes";
       $result = $db->query($query);
       if (mysqli_num_rows($result) > 0) {
           $EarringsTypes = array();
           while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
               $earringtype = new EarringType(
                   $row['earringtypeID'],
                   $row['earringtypeCode'],
                   $row['earringtypeName']
               );
               array_push($earringtypestatements, $earringtype);
               unset($earringtype);
           }
           $db->close();
           return $earringtypestatements;
       } else {
           $db->close();
           return NULL;
       }
   }
   static function findEarringType($earringtypeID)
   {
       $db = getDB();
       $query = "SELECT * FROM EarringsTypes WHERE earringtypeID = $earringtypeID";
       $result = $db->query($query);
       $row = $result->fetch_array(MYSQLI_ASSOC);
       if ($row) {
           $earringtype = new EarringType(
               $row['earringtypeID'],
               $row['earringtypeCode'],
               $row['earringtypeName']
           );
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
       $query = "UPDATE EarringsTypes SET earringtypeID = ?, earringtypeCode = ?, " .
           "earringtypeName = ? " .
           "WHERE earringtypeID = $this->earringtypeID";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "iss",
           $this->earringtypeID,
           $this->earringtypeCode,
           $this->earringtypeName
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
   function removeEarringType()
   {
       $db = getDB();
       $query = "DELETE FROM EarringsTypes WHERE earringtypeID = $this->earringtypeID";
       $result = $db->query($query);
       $db->close();
       return $result;
   }
}
?>
