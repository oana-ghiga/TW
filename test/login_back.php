<?php
// Database connection details
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'herbarium_db';

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
    $username = $data['username'];
    $inpassword = $data['password'];

    // Prepare and execute the SQL query
    $query = "SELECT * FROM users WHERE username = :username AND password = :password";
    $statement = $connection->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $inpassword);
    $statement->execute();

    // Check if a matching user was found
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        $response = array('message' => 'Login successful');
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
?>
