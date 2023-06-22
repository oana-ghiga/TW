<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login_back.php'); // Redirect to the login page
    exit();
}

// Database connection details
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'herbarium_db';

try {
    // Create a new PDO instance
    $connection = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retrieve user information from the database
    $userId = $_SESSION['user_id']; // Assuming you have stored the user ID in the session
    $query = "SELECT * FROM users WHERE user_id = :userId";
    $statement = $connection->prepare($query);
    $statement->bindParam(':userId', $userId);
    $statement->execute();

    // Fetch the user data
    $user = $statement->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>
<h1>User Profile</h1>

<?php
// Display user information if available
if ($user) {
    echo "<p>Username: " . $user['username'] . "</p>";
    echo "<p>Email: " . $user['email'] . "</p>";
    // Add other user details as needed
} else {
    echo "<p>User information not found.</p>";
}
?>

</body>
</html>
