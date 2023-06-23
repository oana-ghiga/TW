<?php
require_once 'Database.php';
// Retrieve the JSON data sent from the frontend
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

// Extract user information from the JSON data
$username = $data['username'];
$email = $data['email'];
$inpassword = $data['password'];

// Insert the user into the database
$query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :inpassword)";
$hashedPassword = password_hash($inpassword, PASSWORD_DEFAULT);
$registerSuccessful = Database::execute($query, [':username' => $username, ':email' => $email, ':inpassword' => $hashedPassword]);

if ($registerSuccessful === TRUE) {
    // User registered successfully, send a success message to the frontend
    $response = array('message' => 'User registered successfully');
} else {
    // Error occurred while registering the user, send an error message to the frontend
    $response = array('message' => 'User registration failed');
}
echo json_encode($response);
