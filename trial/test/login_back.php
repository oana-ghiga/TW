<?php
session_start();
require_once 'Database.php';
// Database connection details

$_SESSION['loggedin'] = false;
$_SESSION['user_id'] = null;
$log=$_SESSION['loggedin'];

// Get the JSON data from the request
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

// Check if the required fields are present
if (isset($data['username']) && isset($data['password'])) {
    $inusername = $data['username'];
    $inpassword = $data['password'];

    // Prepare and execute the SQL query
    $query = "SELECT * FROM users WHERE username = :inusername";


    // Check if a matching user was found
    $user = Database::fetchOne($query, [':inusername' => $inusername]);
    if ($user && password_verify($inpassword, $user['password'])) {
        $response = array('message' => 'Login successful');

        // Assuming the login is successful and you have retrieved the user's information

        $user_id = $user['user_id'];
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $inusername;
        $log=$_SESSION['loggedin'];
    } else {
        $response = array('message' => 'Invalid username or password. Please register first.');
    }
} else {
    $response = array('message' => 'Missing username or password');
}

// Set the JSON response header
header('Content-Type: application/json');

// Convert the response array to JSON format and echo it
echo json_encode($response);