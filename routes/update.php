<?php
// Include the DatabaseHandler class
require_once 'DatabaseHandler.php';

// Create a new instance of the DatabaseHandler class
$db = new DatabaseHandler();

// Check if the required data is present
if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['fav_supe'])) {
    // Create a new entry in the database
    $result = $db->updateEntry($_POST['id'], $_POST['username'], $_POST['email'], $_POST['pass'], $_POST['fav_supe']);

    // Check if the entry was created successfully
    if ($result === 1) {
        echo "Entry updated successfully";
    } else {
        echo "Failed to create entry";
    }
} else {
    echo "Missing required data";
}
?>
