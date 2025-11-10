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
    // Optional fields that map to the database columns
    public $earringCode;
    public $earringDescription;
    public $material;
    public $diameter;
    public $earringWholesalePrice;
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
       $output .= "<h2>earringtype ID: $this->earringtypeID at $this->listPrice</h2>\n";
       return $output;
   }
   function saveEarring()
   {
       $db = getDB();
       // Table has many columns; explicitly insert into the main columns and supply defaults for others
       $query = "INSERT INTO Earring (EarringID, EarringCode, EarringName, EarringDescription, Material, Diameter, EarringTypeID, EarringWholesalePrice, EarringListPrice) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
       $stmt = $db->prepare($query);
       $code = isset($this->earringCode) ? $this->earringCode : '';
       $desc = isset($this->earringDescription) ? $this->earringDescription : '';
       $material = isset($this->material) ? $this->material : '';
       $diameter = isset($this->diameter) ? $this->diameter : 0;
       $wholesale = isset($this->earringWholesalePrice) ? $this->earringWholesalePrice : 0.0;
       $stmt->bind_param(
           "issssidd",
           $this->earringID,
           $code,
           $this->earringName,
           $desc,
           $material,
           $diameter,
           $this->earringtypeID,
           $wholesale,
           $this->listPrice
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
               $row['EarringID'],
               $row['EarringName'],
               $row['EarringTypeID'],
               $row['EarringListPrice']
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
    $query = "SELECT * FROM Earring WHERE EarringID = $earringID";
       $result = $db->query($query);
       $row = $result->fetch_array(MYSQLI_ASSOC);
       if ($row) {
           $earring = new Earring(
               $row['EarringID'],
               $row['EarringName'],
               $row['EarringTypeID'],
               $row['EarringListPrice']
           );
           $db->close();
           return $earring;
       } else {
           $db->close();
           return NULL;
       }
   }
   function updateEarring()
   {
       $db = getDB();
       // Update the main editable fields and supply defaults for optional columns if needed
       $query = "UPDATE Earring SET EarringName = ?, EarringTypeID = ?, EarringListPrice = ? WHERE EarringID = $this->earringID";
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
    $query = "SELECT * from Earring where EarringTypeID = $earringtypeID";
       $result = $db->query($query);
       if (mysqli_num_rows($result) > 0) {
           $earrings = array();
           while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
               $earring = new Earring(
                   $row['EarringID'],
                   $row['EarringName'],
                   $row['EarringTypeID'],
                   $row['EarringListPrice']
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
