<?php
/*
Xander Faison
10/26/2025
IT-202-005
Phase 2 Assignment: CRUD Categories and Items
xrf@njit.edu
*/
require_once('database.php');
class Earring
{
   public $earringID;
   public $earringName;
   public $earringtypeID;
   public $listPrice;
   function __construct(
        $earringID,
        $earringName,
        $earringtypeID,
        $listPrice
       ) {
       $this->earringID = $earringID;
       $this->earringName = $earringName;
       $this->earringtypeID = $earringtypeID;
       $this->listPrice = $listPrice;
   }
   function __toString()
   {
       $output = "<h2>Earring : $this->earringID</h2>" .
           "<h2>Name: $this->earringName</h2>\n";
       "<h2>earringtype ID: $this->earringtypeID at $this->listPrice</h2>\n";
       return $output;
   }
   function saveEarring()
   {
       $db = getDB();
       $query = "INSERT INTO Earring VALUES (?, ?, ?, ?)";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "isid",
           $this->earringID,     // integer data type
           $this->earringName,   // string data type
           $this->earringtypeID, // integer data type
           $this->listPrice   // float data type
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
   static function getEarrings()
   {
       $db = getDB();
       $query = "SELECT * FROM Earring";
       $result = $db->query($query);
       if (mysqli_num_rows($result) > 0) {
           $earrings = array();
           while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
               $earring = new Earring(
                   $row['earringID'],
                   $row['earringName'],
                   $row['earringtypeID'],
                   $row['listPrice']
               );
               array_push($earrings, $earring);
           }
           $db->close();
           return $earrings;
       } else {
           $db->close();
           return NULL;
       }
   }
   static function findEarring($earringID)
   {
       $db = getDB();
       $query = "SELECT * FROM Earring WHERE earringID = $earringID";
       $result = $db->query($query);
       $row = $result->fetch_array(MYSQLI_ASSOC);
       if ($row) {
           $earring = new Earring(
               $row['earringID'],
               $row['earringName'],
               $row['earringtypeID'],
               $row['listPrice']
           );
           $db->close();
           return $earring;
       } else {
           $db->close();
           return NULL;
       }
   }
   function updatEearring()
   {
       $db = getDB();
       $query = "UPDATE Earring SET earringName= ?, " .
           "earringtypeID= ?, listPrice= ? WHERE earringID = $this->earringID";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "sid",
           $this->earringName,
           $this->earringtypeID,
           $this->listPrice
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
   function removeEarring()
   {
       $db = getDB();
       $query = "DELETE FROM Earring WHERE earringID = $this->earringID";
       $result = $db->query($query);
       $db->close();
       return $result;
   }
   static function getEarringsByEarringType($earringtypeID)
   {
       $db = getDB();
       $query = "SELECT * from Earring where earringtypeID = $earringtypeID";
       $result = $db->query($query);
       if (mysqli_num_rows($result) > 0) {
           $earrings = array();
           while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
               $earring = new Earring(
                   $row['earringID'],
                   $row['earringName'],
                   $row['earringtypeID'],
                   $row['listPrice']
               );
               array_push($earrings, $earring);
           }
           $db->close();
           return $earrings;
       } else {
           $db->close();
           return NULL;
       }
   }
}
?>
