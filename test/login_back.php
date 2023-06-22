<?php
session_start();
// Database connection details
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'herbarium_db';


$_SESSION['loggedin'] = false;
$_SESSION['user_id'] = null;
$log=$_SESSION['loggedin'];

// Create a new PDO instance
try {
    $connection = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Get the JSON data from the request
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

// Check if the required fields are present
if (isset($data['username']) && isset($data['password'])) {
    $inusername = $data['username'];
    $inpassword = $data['password'];

    // Prepare and execute the SQL query
    $query = "SELECT * FROM users WHERE username = :inusername AND password = :inpassword";
    $statement = $connection->prepare($query);
    $statement->bindParam(':inusername', $inusername);
    $statement->bindParam(':inpassword', $inpassword);
    $statement->execute();

    // Check if a matching user was found
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if ($user) {
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