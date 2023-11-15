<?php
require_once('./DatabaseHandler.php');
$db = new DatabaseHandler();
$id = 1;
$username = "raja";
$pass = "134";
$email = "rsinh1723@yahoo.com";
$fav_supe = "spiderman";

// create entry route
// $res = $db->createEntry("rameshSahu", "qwertt", "ramesh@sahi.com", "green beetle");
// $res = $db->createEntry("mike michelson", "akjsle", "mike@reddit.com", "hawkeye");

// update entry route

// read all entries route
$tableRows = $db->readAll();
if($tableRows != 0){
    $tableRowsString = implode('', $tableRows);
    echo "<table>{$tableRowsString}</table>";
}

// read by id route 

// delete entry route
$res = $db->deleteEntry(3);
?>