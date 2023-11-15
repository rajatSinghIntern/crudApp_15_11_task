<?php
    // Include the DatabaseHandler class file
    require_once 'DatabaseHandler.php';

    // Create a new instance of the DatabaseHandler class
    $db = new DatabaseHandler();

    // Get the ID from the URL parameters
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
        // Call the deleteEntry function with the ID
        $db->deleteEntry($id);
    }
?>
