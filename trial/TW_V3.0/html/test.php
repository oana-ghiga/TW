<?php
// Retrieve the JSON data sent from the frontend
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);
//var_dump($data);die();

// Extract user information from the JSON data
$username = $data['username'];
$email = $data['email'];
$inpassword = $data['password'];

// Create a connection to the database
$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'herbarium_db';

$conn = new mysqli($host, $user, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the user into the database
$query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$inpassword')";

if ($conn->query($query) === TRUE) {
    // User registered successfully, send a success message to the frontend
    $response = array('message' => 'User registered successfully');
    echo json_encode($response);
} else {
    // Error occurred while registering the user, send an error message to the frontend
    $response = array('message' => 'Error: ' . $conn->error);
    echo json_encode($response);
}

// Close the database connection
$conn->close();
?>



