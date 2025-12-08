<?php
/*
Xander Faison
12/05/2025
IT-202-005
Phase 5 Assignment: JavaScript
xrf@njit.edu
*/
ob_start();
require_once("earringtype.php");
require_once("earring.php");
// Fetch values using the static methods from earringtype.php and earring.php
// Note: Add getTotalEarringTypes() and getTotalEarringsByType() methods to classes as needed
// For now, count items from database directly
$db = getDB();
$doc = new DOMDocument("1.0");
$inventoryElement = $doc->createElement("inventory");
$inventoryElement = $doc->appendChild($inventoryElement);
// Add <categories> XML element with value
$categoriesElement = $doc->createElement("categories", $totalCategories);
$categoriesElement = $inventoryElement->appendChild($categoriesElement);
// Add <items> XML element with value
$itemsElement = $doc->createElement("items", $totalItems);
$itemsElement = $inventoryElement->appendChild($itemsElement);
// Add <listpricetotal> XML element with value
$listpricetotalElement = $doc->createElement("listpricetotal", $listpricetotal);
$listpricetotalElement = $inventoryElement->appendChild($listpricetotalElement);
$output = $doc->saveXML();
header("Content-type: application/xml");
ob_end_clean();
echo $output;
?>