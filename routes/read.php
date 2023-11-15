<?php
require_once 'DatabaseHandler.php';

$db = new DatabaseHandler();

if (isset($_GET['id'])) {
    $data = $db->readById($_GET['id']);
} else {
    $data = $db->readAll();
}

if ($data !== 0) {
    $json = json_encode($data);

    header('Content-Type: application/json');

    echo $json;
} else {
    echo "Failed to fetch data";
}
?>
