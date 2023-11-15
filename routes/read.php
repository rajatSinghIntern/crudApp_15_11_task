<?php
// Include the DatabaseHandler class
require_once 'DatabaseHandler.php';

// Create a new instance of the DatabaseHandler class
$db = new DatabaseHandler();

// Check if an id was provided
if (isset($_GET['id'])) {
    // Fetch data for the specified id from the database
    $data = $db->readById($_GET['id']);
} else {
    // Fetch all data from the database
    $data = $db->readAll();
}

// Check if data was fetched successfully
if ($data !== 0) {
    // Convert the data to JSON format
    $json = json_encode($data);

    // Set the Content-Type header to application/json
    header('Content-Type: application/json');

    // Output the JSON data
    echo $json;
} else {
    // If there was an error, output a failure message
    echo "Failed to fetch data";
}
?>
