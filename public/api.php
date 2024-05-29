<?php

// Include your Database class
include_once '../app/core/Database.php';
include_once '../app/core/config.php';

// Instantiate the Database class
$db = new Database();

// Fetch data from the database
$query = "SELECT * FROM bookings";
$data = $db->query($query);

// Output data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
