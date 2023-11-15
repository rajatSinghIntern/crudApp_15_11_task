<?php
require_once 'DatabaseHandler.php';

$db = new DatabaseHandler();

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['fav_supe'])) {

    $result = $db->createEntry($_POST['username'], $_POST['email'], $_POST['pass'], $_POST['fav_supe']);

    if ($result === 1) {
        echo "Entry created successfully";
    } else {
        echo "Failed to create entry";
    }
} else {
    echo "Missing required data";
}
?>
