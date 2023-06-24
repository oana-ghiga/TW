<?php
// Define the endpoint to fetch plant data
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "SELECT id, image_link FROM plant_names";
    $plants = Database::fetchAll($query);
    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($plants);
}

