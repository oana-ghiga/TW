<?php
include 'Database.php';
include 'functions.php';

session_start();

$host = "localhost";
$dbname = "herbarium_db";
$username = "root";
$password = "root";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Define the endpoint to fetch plant data
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $db->prepare("SELECT id, image_link FROM plant_names");
    $stmt->execute();
    $plants = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($plants);
}
?>