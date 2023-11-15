<?php
    require_once 'DatabaseHandler.php';

    $db = new DatabaseHandler();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
        $db->deleteEntry($id);
    }
?>
